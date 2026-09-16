// js/infinite-news.js
(function () {
  if (!window.InfinitePosts) return;

  const restUrl   = InfinitePosts.restUrl;
  let   nextPaged = InfinitePosts.nextPaged;
  const maxPages  = InfinitePosts.maxPages;
  const container = document.querySelector(InfinitePosts.container || '.news .row');
  const sentinel  = document.querySelector(InfinitePosts.sentinel || '#infinite-sentinel');

  if (!container || !sentinel || !restUrl) return;

  let locked = false;
  let waitingForExit = false;   // exige sair de vista antes da próxima carga
  const COOLDOWN_MS = 150;

  const loader = document.createElement('div');
  loader.className = 'infinite-loader';
  loader.textContent = 'Carregando…';

  function showLoader() {
    if (loader.parentNode !== container) {
      container.insertBefore(loader, sentinel);
    }
  }
  function hideLoader() {
    if (loader.parentNode) loader.parentNode.removeChild(loader);
  }

  async function loadMore() {
    if (!nextPaged || locked) return;

    locked = true;
    waitingForExit = true;
    showLoader();

    try {
      const url = new URL(restUrl);
      url.searchParams.set('paged', nextPaged);

      const res = await fetch(url.toString(), { method: 'GET', cache: 'no-store' });
      if (!res.ok) throw new Error('Erro ' + res.status);
      const data = await res.json();

      if (data && data.html) {
        const frag = document.createElement('div');
        frag.innerHTML = data.html;
        while (frag.firstChild) {
          container.insertBefore(frag.firstChild, sentinel); // insere antes do sentinela
        }
      }

      nextPaged = data && data.next_paged ? data.next_paged : null;

    } catch (err) {
      console.error('InfinitePosts:', err);

    } finally {
      hideLoader();
      setTimeout(() => { locked = false; }, COOLDOWN_MS);

      if (!nextPaged) {
        observer.disconnect();
        sentinel.remove();
      }
    }
  }

  const observer = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (entry.isIntersecting && !waitingForExit) {
        loadMore();
      }
      if (!entry.isIntersecting && waitingForExit) {
        waitingForExit = false;
      }
    }
  }, {
    rootMargin: "0px 0px 800px 0px", // pré-carrega ~800px antes do fim
    threshold: 0.01
  });

  if (nextPaged) observer.observe(sentinel);
})();
