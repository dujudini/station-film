// js/infinite-socials.js
(function () {
  // evita múltiplas inits
  if (window.__INFINITE_SOCIALS_INITED__) return;
  window.__INFINITE_SOCIALS_INITED__ = true;

  if (!window.InfiniteSocials) return;

  const restUrl   = InfiniteSocials.restUrl;
  let   nextPaged = InfiniteSocials.nextPaged;
  const container = document.querySelector(InfiniteSocials.container || '.socials-wrap');
  const sentinel  = document.querySelector(InfiniteSocials.sentinel  || '#infinite-sentinel-socials');
  if (!restUrl || !container || !sentinel) return;

  // Mutex + “exit-before-next”
  let locked = false;
  let waitingForExit = false;              // exige sair do viewport antes da próxima carga
  const COOLDOWN_MS = 150;                 // pequeno debounce

  // Loader: ficará SEMPRE imediatamente antes do sentinela
  const loader = document.createElement('div');
  loader.className = 'infinite-loader';
  loader.textContent = '  ';

  function showLoader() {
    if (loader.parentNode !== container) {
      container.insertBefore(loader, sentinel);  // loader ANTES do sentinela
    }
  }
  function hideLoader() {
    if (loader.parentNode) loader.parentNode.removeChild(loader);
  }

  function notifyAppended(nodes) {
    try {
      document.dispatchEvent(new CustomEvent('socials:items-appended', {
        detail: { root: container, nodes }
      }));
    } catch (e) {}
  }

  async function loadMore() {
    if (!nextPaged || locked) return;

    // trava e exige “exit” antes do próximo disparo
    locked = true;
    waitingForExit = true;
    showLoader();

    try {
      const url = new URL(restUrl);
      url.searchParams.set('paged', nextPaged);

      const res = await fetch(url.toString(), { method: 'GET', cache: 'no-store' });
      if (!res.ok) throw new Error('HTTP ' + res.status);

      const data = await res.json();

      if (data && data.html) {
        const frag = document.createElement('div');
        frag.innerHTML = data.html;

        const appendedNodes = [];
        // **sempre** insere ANTES do sentinela -> sentinela permanece no fim
        while (frag.firstChild) {
          const node = frag.firstChild;
          appendedNodes.push(node);
          container.insertBefore(node, sentinel);
        }

        // avisa seu player/JS para lidar com os novos cards
        notifyAppended(appendedNodes);
      }

      // próxima página (ou fim)
      nextPaged = (data && data.next_paged) ? data.next_paged : null;

    } catch (e) {
      console.error('InfiniteSocials:', e);

    } finally {
      hideLoader();

      // cooldown curto para evitar retriggers imediatos
      setTimeout(() => { locked = false; }, COOLDOWN_MS);

      if (!nextPaged) {
        try { observer.disconnect(); } catch (e) {}
        // mantém o sentinela se quiser (não faz diferença); pode remover:
        sentinel.remove();
      }
    }
  }

  const observer = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      // dispara quando “visto” + ainda não exigiu sair
      if (entry.isIntersecting && !waitingForExit) {
        loadMore();
      }
      // libera próxima carga somente depois que o sentinela sair do viewport
      if (!entry.isIntersecting && waitingForExit) {
        waitingForExit = false;
      }
    }
  }, {
    // pré-carrega ~800px antes do sentinela entrar na tela
    // (aumente/diminua conforme a altura média dos cartões)
    rootMargin: '0px 0px 1200px 0px',
    threshold: 0.01
  });

  observer.observe(sentinel);

  // ---------------------------------------------------------------------
  // Lazy-load + play/pause dos vídeos de preview (.social-vid)
  // Só baixa e toca quando o card está visível; pausa e libera a memória
  // quando sai da tela.
  const videoObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      const v = entry.target;
      if (entry.isIntersecting) {
        if (!v.src && v.dataset.src) v.src = v.dataset.src;
        const p = v.play();
        if (p && p.catch) p.catch(() => {});
      } else {
        v.pause();
      }
    });
  }, {
    rootMargin: '200px 0px 200px 0px',
    threshold: 0.25
  });

  function watchVideos(root) {
    (root || document).querySelectorAll('video.social-vid[data-src]').forEach((v) => {
      videoObserver.observe(v);
    });
  }

  watchVideos(document);
  document.addEventListener('socials:items-appended', (e) => {
    (e.detail && e.detail.nodes || []).forEach((node) => {
      if (node.nodeType === 1) watchVideos(node);
    });
  });
})();
