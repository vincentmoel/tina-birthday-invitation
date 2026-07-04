<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="theme-color" content="#F8F7F5" />
<title>Christina &amp; Elnathan Grateful Party</title>
<meta name="description" content="Join us for a graceful evening of gratitude and celebration with Christina &amp; Elnathan." />
<meta property="og:title" content="Christina &amp; Elnathan Grateful Party" />
<meta property="og:description" content="Join us for a graceful evening of gratitude and celebration with Christina &amp; Elnathan." />
<meta property="og:image" content="{{ asset('meta-photo.jpg') }}" />
<meta property="og:image:alt" content="Christina and Elnathan Grateful Party invitation photo" />
<meta property="og:type" content="website" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Christina &amp; Elnathan Grateful Party" />
<meta name="twitter:description" content="Join us for a graceful evening of gratitude and celebration with Christina &amp; Elnathan." />
<meta name="twitter:image" content="{{ asset('meta-photo.jpg') }}" />
<link rel="icon" href="{{ asset('confetti.png') }}" type="image/png" />
<link rel="shortcut icon" href="{{ asset('confetti.png') }}" type="image/png" />
<link rel="apple-touch-icon" href="{{ asset('confetti.png') }}" />
<script>
  if ('scrollRestoration' in history) history.scrollRestoration = 'manual';
  window.scrollTo(0, 0);
</script>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<link rel="stylesheet" href="{{ asset('styles.css') }}" />
</head>
<body class="locked">
<div id="fadeOverlay"></div>
<button class="music-toggle" id="musicToggle" aria-label="Toggle music">
  <img src="{{ asset('piringan-hitam.png') }}" alt="" aria-hidden="true">
</button>
<section class="section" id="hero">
  <div class="aurora"><div class="blob b1"></div><div class="blob b2"></div><div class="blob b3"></div></div>
  <div class="particles" id="particles"></div>
  <div class="float-layer" id="heroFloat"></div>
  <div class="hero-inner">
    <span class="eyebrow">You're Invited</span>
    <div class="names"><span class="name">Christina</span><span class="amp">&amp;</span><span class="name">Elnathan</span></div>
    <h1 class="hero-title">Grateful<br><em>Party</em></h1>
    <div class="recipient"><span class="eyebrow">Dear</span><span class="recipient-name" id="guestName">Guest</span></div>
    <button class="btn btn-primary open-btn" id="openBtn"><i class="fa-solid fa-gift"></i> Open Invitation</button>
  </div>
  <div class="scroll-hint" id="scrollHint"><span>Scroll</span><i class="fa-solid fa-chevron-down"></i></div>
</section>
<section class="section" id="details">
  <div class="float-layer" id="detailsFloat"></div>
  <div class="section-head reveal"><span class="eyebrow">The Party</span><h2>Save the <em>Date</em></h2></div>
  <div class="invite-date reveal d1"><span class="id-top">Thursday</span><span class="id-day">23</span><span class="id-month">July 2026</span></div>
  <div class="invite-meta">
    <div class="meta reveal d1"><span class="m-label"><i class="fa-solid fa-clock"></i> Time</span><span class="m-value">17:30 WIB</span></div>
    <div class="meta reveal d2"><span class="m-label"><i class="fa-solid fa-shirt"></i> Dress Code</span><span class="m-value">Pink or Brown</span></div>
    <div class="meta reveal d3"><span class="m-label"><i class="fa-solid fa-location-dot"></i> Venue</span><span class="m-value">Efrata Ballroom , House of Susan<span class="m-sub">Jl. Kh Ahmad Dahlan No.49</span></span></div>
  </div>
  <a class="btn map-btn reveal d5" href="https://maps.app.goo.gl/F5bVrmcS435JCHD57" target="_blank" rel="noopener"><i class="fa-solid fa-location-dot"></i> Open in Google Maps</a>
</section>
<section class="section" id="rsvp">
  <div class="float-layer" id="rsvpFloat"></div>
  <div class="rsvp-wrap">
    <div class="section-head reveal" style="margin-bottom:clamp(2.8rem,7vh,3.6rem);"><span class="eyebrow">RSVP &amp; Wishes</span><h2>Your Presence Means Everything</h2></div>
    <form id="rsvpForm" class="reveal d1" novalidate autocomplete="off">
      @csrf
      <div class="field"><label for="name">Your Name</label><input type="text" id="name" name="name" placeholder="How should we address you?" required autocomplete="off" /></div>
      <div class="field"><label for="wishes">Birthday Wishes</label><textarea id="wishes" name="wish" placeholder="Write something from the heart..." autocomplete="off"></textarea></div>
      <div class="field">
        <label>Will You Join Us?</label>
        <div class="rsvp-options">
          <label class="opt"><input type="radio" name="attend" value="1" required autocomplete="off" /><span class="opt-box"><span class="opt-dot"></span><span class="opt-text">Attending</span></span></label>
          <label class="opt"><input type="radio" name="attend" value="0" autocomplete="off" /><span class="opt-box"><span class="opt-dot"></span><span class="opt-text">Unable to Attend</span></span></label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary submit-btn">Send Wishes</button>
    </form>
    <div class="thanks" id="thanks"><span class="flourish"></span><h3>Thank You</h3><p id="thanksMsg">Your wishes have been received. We can't wait to celebrate with you.</p><button class="reset" id="resetBtn">Send another wish</button></div>
    <div class="wishes-wall reveal d2">
      <div class="wishes-head"><h3 class="wishes-title">Warm Wishes</h3><span class="wishes-line"></span></div>
      <div class="wish-list" id="wishList">
        @forelse ($wishes as $index => $wish)
          <div class="wish {{ $index >= 5 ? 'is-hidden' : '' }}" data-wish-index="{{ $index }}">
            <p class="wish-msg">&ldquo;{{ $wish->wish }}&rdquo;</p>
            <span class="wish-name">{{ $wish->name }}</span>
          </div>
        @empty
          <div class="wish">
            <p class="wish-msg">&ldquo;Be the first to leave a wish.&rdquo;</p>
            <span class="wish-name">Christina &amp; Elnathan</span>
          </div>
        @endforelse
      </div>
      @if ($wishes->count() > 5)
        <button class="load-more" id="loadMore">Load More Wishes</button>
      @endif
    </div>
  </div>
</section>
<script>
(function () {
  'use strict';
  const body = document.body;
  const heroSection = document.getElementById('hero');
  const openBtn = document.getElementById('openBtn');
  const fadeOverlay = document.getElementById('fadeOverlay');
  const detailsSection = document.getElementById('details');
  const scrollHint = document.getElementById('scrollHint');
  const musicToggle = document.getElementById('musicToggle');
  const form = document.getElementById('rsvpForm');
  const thanks = document.getElementById('thanks');
  const thanksMsg = document.getElementById('thanksMsg');
  const resetBtn = document.getElementById('resetBtn');
  const wishList = document.getElementById('wishList');
  const loadMore = document.getElementById('loadMore');
  const submitBtn = form.querySelector('.submit-btn');
  const token = document.querySelector('input[name="_token"]').value;
  const params = new URLSearchParams(location.search);
  const raw = params.get('to');
  const clean = raw ? raw.replace(/[<>]/g, '').trim().slice(0, 60) : '';
  document.getElementById('guestName').textContent = clean || 'Guest';
  const ICONS = ['fa-solid fa-cake-candles','fa-solid fa-gift','fa-regular fa-heart','fa-solid fa-star','fa-solid fa-champagne-glasses','fa-regular fa-star'];
  function seedFloats(layerId, count) {
    const layer = document.getElementById(layerId);
    if (!layer) return;
    layer.style.position = 'absolute';
    layer.style.inset = '0';
    layer.style.zIndex = '1';
    layer.style.pointerEvents = 'none';
    layer.style.overflow = 'hidden';
    for (let i = 0; i < count; i++) {
      const el = document.createElement('i');
      el.className = 'float ' + ICONS[Math.floor(Math.random() * ICONS.length)];
      el.style.left = Math.random() * 100 + '%';
      el.style.top = (60 + Math.random() * 50) + '%';
      el.style.fontSize = (10 + Math.random() * 18) + 'px';
      el.style.animationDuration = (12 + Math.random() * 12) + 's';
      el.style.animationDelay = (Math.random() * 10) + 's';
      el.style.opacity = '0';
      layer.appendChild(el);
    }
  }
  seedFloats('heroFloat', 9); seedFloats('detailsFloat', 7); seedFloats('rsvpFloat', 7);
  (function particles() {
    const p = document.getElementById('particles');
    for (let i = 0; i < 22; i++) {
      const dot = document.createElement('span');
      dot.className = 'particle';
      const size = 3 + Math.random() * 5;
      dot.style.width = size + 'px';
      dot.style.height = size + 'px';
      dot.style.left = Math.random() * 100 + '%';
      dot.style.bottom = '-10px';
      dot.style.animationDuration = (10 + Math.random() * 12) + 's';
      dot.style.animationDelay = (Math.random() * 12) + 's';
      p.appendChild(dot);
    }
  })();
  const Music = (function () {
    let audio = null, playing = false;
    function play() { if (!audio) { audio = new Audio('{{ asset('backsound.mp3') }}'); audio.loop = true; audio.preload = 'auto'; audio.volume = 0.55; } playing = true; audio.play().catch(() => {}); musicToggle.classList.add('playing'); }
    function pause() { playing = false; if (audio) audio.pause(); musicToggle.classList.remove('playing'); }
    function toggle() { playing ? pause() : play(); }
    return { play, pause, toggle, get playing() { return playing; } };
  })();
  musicToggle.addEventListener('click', () => Music.toggle());
  let resumeOnReturn = false;
  function stopMusicIfNeeded() { resumeOnReturn = Music.playing; if (Music.playing) Music.pause(); }
  function resumeMusicIfNeeded() { if (resumeOnReturn && !Music.playing) { resumeOnReturn = false; Music.play(); } }
  document.addEventListener('visibilitychange', () => { if (document.hidden) stopMusicIfNeeded(); else resumeMusicIfNeeded(); });
  window.addEventListener('pagehide', stopMusicIfNeeded);
  window.addEventListener('beforeunload', stopMusicIfNeeded);
  window.addEventListener('pageshow', () => { if (!opened) window.scrollTo(0, 0); });
  window.addEventListener('load', () => { if (!opened) window.scrollTo(0, 0); });
  const io = new IntersectionObserver((entries) => { entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }); }, { threshold: 0.18 });
  document.querySelectorAll('.reveal').forEach((el) => io.observe(el));
  let invitationOpenedOnce = false;
  const heroObserver = new IntersectionObserver((entries) => { entries.forEach((entry) => { if (entry.target !== heroSection) return; const showOpenBtn = entry.isIntersecting && !invitationOpenedOnce; openBtn.classList.toggle('is-hidden', !showOpenBtn); }); }, { threshold: 0.55 });
  if (heroSection) heroObserver.observe(heroSection);
  let opened = false;
  function openInvitation() {
    if (opened) return;
    opened = true;
    invitationOpenedOnce = true;
    openBtn.classList.add('is-hidden');
    fadeOverlay.classList.add('active');
    try { Music.play(); } catch (e) {}
    setTimeout(() => {
      body.classList.remove('locked');
      scrollHint.classList.add('show');
      detailsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      setTimeout(() => fadeOverlay.classList.remove('active'), 350);
      setTimeout(() => musicToggle.classList.add('show'), 180);
    }, 750);
  }
  openBtn.addEventListener('click', openInvitation);
  function buildWish(name, msg, isNew) {
    const el = document.createElement('div');
    el.className = 'wish' + (isNew ? ' new' : '');
    const p = document.createElement('p');
    p.className = 'wish-msg';
    p.textContent = '“' + msg + '”';
    const s = document.createElement('span');
    s.className = 'wish-name';
    s.textContent = name || 'A Dear Friend';
    el.appendChild(p);
    el.appendChild(s);
    return el;
  }
  function revealWish(el) {
    if (!el) return;
    el.classList.remove('is-hidden');
    requestAnimationFrame(() => el.classList.add('show'));
  }
  function getHiddenWishes() {
    return Array.from(wishList.querySelectorAll('.wish.is-hidden'));
  }
  if (loadMore) {
    loadMore.addEventListener('click', function () {
      const hiddenWishes = getHiddenWishes();
      hiddenWishes.slice(0, 5).forEach(revealWish);
      if (wishList.querySelector('.wish.is-hidden') === null) {
        loadMore.hidden = true;
      }
    });
  }
  form.addEventListener('submit', async function (e) {
    e.preventDefault();
    if (submitBtn.disabled) return;
    const name = document.getElementById('name').value.trim();
    const attend = (form.querySelector('input[name="attend"]:checked') || {}).value;
    if (!name) return document.getElementById('name').focus();
    if (attend === undefined) return;
    const wish = document.getElementById('wishes').value.trim();
    submitBtn.disabled = true;
    submitBtn.classList.add('is-loading');
    submitBtn.textContent = 'Sending...';
    try {
      const response = await fetch("{{ route('wishes.store') }}", {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: new URLSearchParams({ name, wish, attend })
      });
      if (!response.ok) {
        return;
      }
      await response.json();
      const el = buildWish(name, wish, true);
      requestAnimationFrame(() => el.classList.add('show'));
      wishList.insertBefore(el, wishList.firstChild);
      if (loadMore && loadMore.hidden) {
        loadMore.hidden = false;
      }
      thanksMsg.textContent = name + ', your wish has been received.';
      form.style.transition = 'opacity 0.5s var(--ease), transform 0.5s var(--ease)';
      form.style.opacity = '0';
      form.style.transform = 'scale(0.97)';
      setTimeout(() => { form.style.display = 'none'; thanks.classList.add('show'); }, 480);
    } finally {
      submitBtn.disabled = false;
      submitBtn.classList.remove('is-loading');
      submitBtn.innerHTML = 'Send Wishes';
    }
  });
  resetBtn.addEventListener('click', function () {
    thanks.classList.remove('show');
    form.reset();
    form.style.display = '';
    submitBtn.disabled = false;
    submitBtn.classList.remove('is-loading');
    submitBtn.innerHTML = 'Send Wishes';
    requestAnimationFrame(() => { form.style.opacity = '1'; form.style.transform = 'scale(1)'; });
  });
  window.addEventListener('scroll', function () { if (body.classList.contains('locked')) window.scrollTo(0, 0); }, { passive: true });
})();
</script>
</body>
</html>
