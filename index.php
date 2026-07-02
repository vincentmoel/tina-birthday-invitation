<?php $cssVersion = filemtime(__DIR__ . '/styles.css'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="theme-color" content="#F8F7F5" />
<title>Grateful Party — You're Invited</title>
<script>
  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }
  window.scrollTo(0, 0);
</script>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<link rel="stylesheet" href="styles.css?v=<?php echo $cssVersion; ?>" />

</head>
<body class="locked">

<!-- Fade transition overlay -->
<div id="fadeOverlay"></div>

<!-- Music toggle -->
<button class="music-toggle" id="musicToggle" aria-label="Toggle music">
  <img src="piringan-hitam.png" alt="" aria-hidden="true">
</button>

<!-- ================= SECTION 1 — HERO ================= -->
<section class="section" id="hero">
  <div class="aurora">
    <div class="blob b1"></div>
    <div class="blob b2"></div>
    <div class="blob b3"></div>
  </div>
  <div class="particles" id="particles"></div>
  <div class="float-layer" id="heroFloat"></div>

  <div class="hero-inner">
    <span class="eyebrow">You're Invited</span>
    <div class="names">
      <span class="name">Christina</span>
      <span class="amp">&amp;</span>
      <span class="name">Elnathan</span>
    </div>
    <h1 class="hero-title">Grateful<br><em>Party</em></h1>
    <div class="recipient">
      <span class="eyebrow">Dear</span>
      <span class="recipient-name" id="guestName">Guest</span>
    </div>
    <button class="btn btn-primary open-btn" id="openBtn">
      <i class="fa-solid fa-gift"></i> Open Invitation
    </button>
  </div>

  <div class="scroll-hint" id="scrollHint">
    <span>Scroll</span>
    <i class="fa-solid fa-chevron-down"></i>
  </div>
</section>

<!-- ================= SECTION 2 — DETAILS ================= -->
<section class="section" id="details">
  <div class="float-layer" id="detailsFloat"></div>

  <div class="section-head reveal">
    <span class="eyebrow">The Party</span>
    <h2>Save the <em>Date</em></h2>
  </div>

  <div class="invite-date reveal d1">
    <span class="id-top">Thursday</span>
    <span class="id-day">23</span>
    <span class="id-month">July 2026</span>
  </div>

  <div class="invite-meta">
    <div class="meta reveal d1">
      <span class="m-label"><i class="fa-solid fa-clock"></i> Time</span>
      <span class="m-value">17:30 WIB</span>
    </div>
    <div class="meta reveal d2">
      <span class="m-label"><i class="fa-solid fa-shirt"></i> Dress Code</span>
      <span class="m-value">Pink or Brown</span>
    </div>
    <div class="meta reveal d3">
      <span class="m-label"><i class="fa-solid fa-location-dot"></i> Venue</span>
      <span class="m-value">Efrata Ballroom , House of Susan<span class="m-sub">Jl. Kh Ahmad Dahlan No.49</span></span>
    </div>
  </div>

  <a class="btn map-btn reveal d5" href="https://maps.app.goo.gl/F5bVrmcS435JCHD57" target="_blank" rel="noopener">
    <i class="fa-solid fa-location-dot"></i> Open in Google Maps
  </a>
</section>

<!-- ================= SECTION 3 — RSVP ================= -->
<section class="section" id="rsvp">
  <div class="float-layer" id="rsvpFloat"></div>

  <div class="rsvp-wrap">
    <div class="section-head reveal" style="margin-bottom:clamp(2.8rem,7vh,3.6rem);">
      <span class="eyebrow">RSVP &amp; Wishes</span>
      <h2>Your Presence Means <em>Everything</em></h2>
    </div>

    <form id="rsvpForm" class="reveal d1" novalidate>
      <div class="field">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" placeholder="How should we address you?" required />
      </div>

      <div class="field">
        <label for="wishes">Birthday Wishes</label>
        <textarea id="wishes" name="wishes" placeholder="Write something from the heart..."></textarea>
      </div>

      <div class="field">
        <label>Will You Join Us?</label>
        <div class="rsvp-options">
          <label class="opt">
            <input type="radio" name="rsvp" value="attending" required />
            <span class="opt-box">
              <span class="opt-dot"></span>
              <span class="opt-text">Attending</span>
            </span>
          </label>
          <label class="opt">
            <input type="radio" name="rsvp" value="maybe" />
            <span class="opt-box">
              <span class="opt-dot"></span>
              <span class="opt-text">Not Sure Yet</span>
            </span>
          </label>
          <label class="opt">
            <input type="radio" name="rsvp" value="unable" />
            <span class="opt-box">
              <span class="opt-dot"></span>
              <span class="opt-text">Unable to Attend</span>
            </span>
          </label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary submit-btn">Send Wishes</button>
    </form>

    <div class="thanks" id="thanks">
      <span class="flourish"></span>
      <h3>Thank You</h3>
      <p id="thanksMsg">Your wishes have been received. We can't wait to celebrate with you.</p>
      <button class="reset" id="resetBtn">Send another wish</button>
    </div>

    <div class="wishes-wall reveal d2">
      <div class="wishes-head">
        <h3 class="wishes-title">Warm Wishes</h3>
        <span class="wishes-line"></span>
      </div>
      <div class="wish-list" id="wishList">
        <div class="wish">
          <p class="wish-msg">&ldquo;Wishing you both endless joy and a year overflowing with love and laughter.&rdquo;</p>
          <span class="wish-name">Grace &amp; Family</span>
        </div>
        <div class="wish">
          <p class="wish-msg">&ldquo;Happy birthday! May this new chapter be your most beautiful one yet.&rdquo;</p>
          <span class="wish-name">Daniel</span>
        </div>
        <div class="wish">
          <p class="wish-msg">&ldquo;So grateful to celebrate two wonderful souls. Have the happiest of days.&rdquo;</p>
          <span class="wish-name">Aunt Maria</span>
        </div>
      </div>
      <button class="load-more" id="loadMore">Load More Wishes</button>
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

  /* ---------- Personalize recipient (?to=Name) ---------- */
  (function setRecipient() {
    const el = document.getElementById('guestName');
    if (!el) return;
    const params = new URLSearchParams(location.search);
    const raw = params.get('to');
    const clean = raw ? raw.replace(/[<>]/g, '').trim().slice(0, 60) : '';
    el.textContent = clean || 'Guest';
  })();

  /* ---------- Floating decorative elements ---------- */
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
  seedFloats('heroFloat', 9);
  seedFloats('detailsFloat', 7);
  seedFloats('rsvpFloat', 7);

  /* ---------- Light particles ---------- */
  (function particles() {
    const p = document.getElementById('particles');
    const n = 22;
    for (let i = 0; i < n; i++) {
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

  /* ---------- Ambient music ---------- */
  const Music = (function () {
    let audio = null, playing = false;

    function play() {
      if (!audio) {
        audio = new Audio('backsound.mp3');
        audio.loop = true;
        audio.preload = 'auto';
        audio.volume = 0.55;
      }
      playing = true;
      audio.play().catch(() => {});
      musicToggle.classList.add('playing');
    }

    function pause() {
      playing = false;
      if (audio) audio.pause();
      musicToggle.classList.remove('playing');
    }

    function stop() {
      playing = false;
      if (audio) {
        audio.pause();
        audio.currentTime = 0;
      }
      musicToggle.classList.remove('playing');
    }

    function toggle() { playing ? pause() : play(); }

    return { play, pause, stop, toggle, get playing() { return playing; } };
  })();

  musicToggle.addEventListener('click', () => Music.toggle());

  let resumeOnReturn = false;
  function stopMusicIfNeeded() {
    resumeOnReturn = Music.playing;
    if (Music.playing) Music.pause();
  }

  function resumeMusicIfNeeded() {
    if (resumeOnReturn && !Music.playing) {
      resumeOnReturn = false;
      Music.play();
    }
  }

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stopMusicIfNeeded();
    else resumeMusicIfNeeded();
  });
  window.addEventListener('pagehide', stopMusicIfNeeded);
  window.addEventListener('beforeunload', stopMusicIfNeeded);
  window.addEventListener('blur', () => {
    if (document.hidden) stopMusicIfNeeded();
  });
  window.addEventListener('pageshow', () => {
    if (!opened) window.scrollTo(0, 0);
  });
  window.addEventListener('load', () => {
    if (!opened) window.scrollTo(0, 0);
  });

  /* ---------- Scroll reveal ---------- */
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        e.target.classList.add('in');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.18 });
  document.querySelectorAll('.reveal').forEach((el) => io.observe(el));

  let invitationOpenedOnce = false;
  const heroObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.target !== heroSection) return;
      const showOpenBtn = entry.isIntersecting && !invitationOpenedOnce;
      openBtn.classList.toggle('is-hidden', !showOpenBtn);
    });
  }, { threshold: 0.55 });
  if (heroSection) heroObserver.observe(heroSection);

  /* ---------- Open invitation ---------- */
  let opened = false;
  function openInvitation() {
    if (opened) return;
    opened = true;
    invitationOpenedOnce = true;
    openBtn.classList.add('is-hidden');

    // soft fade transition
    fadeOverlay.classList.add('active');

    // start music
    try { Music.play(); } catch (e) {}

    setTimeout(() => {
      // unlock scroll
      body.classList.remove('locked');
      scrollHint.classList.add('show');

      // smooth scroll to section 2
      detailsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });

      // fade overlay back out
      setTimeout(() => fadeOverlay.classList.remove('active'), 350);

      // show music control after the section transition begins
      setTimeout(() => musicToggle.classList.add('show'), 180);
    }, 750);
  }
  openBtn.addEventListener('click', openInvitation);

  /* ---------- RSVP form ---------- */
  const form = document.getElementById('rsvpForm');
  const thanks = document.getElementById('thanks');
  const thanksMsg = document.getElementById('thanksMsg');
  const resetBtn = document.getElementById('resetBtn');
  const wishList = document.getElementById('wishList');
  const loadMore = document.getElementById('loadMore');

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

  function addWish(name, msg) {
    wishList.insertBefore(buildWish(name, msg, true), wishList.firstChild);
  }

  /* ---------- Load more wishes (5 per click) ---------- */
  const wishPool = [
    { name: 'Nathan & Sofia', msg: 'May your days ahead be as bright and beautiful as the two of you.' },
    { name: 'Pak Andre', msg: 'Happy birthday to a remarkable mother and her wonderful child. Cheers to you both!' },
    { name: 'Clara', msg: 'Sending the warmest hugs and the happiest wishes on your special day.' },
    { name: 'The Wijaya Family', msg: 'Two birthdays, twice the blessings. We are so happy for you both.' },
    { name: 'Michael', msg: 'Wishing you health, happiness, and a celebration to remember.' },
    { name: 'Tante Rina', msg: 'May this year bring you closer, with more laughter and beautiful memories.' },
    { name: 'Joshua', msg: 'Happy birthday! May every wish in your heart come true this year.' },
    { name: 'Bella', msg: 'To a beautiful mother and her lovely child — have the most joyful day.' },
    { name: 'Om Hendra', msg: 'Cheers to good health, great joy, and many more years of celebration.' },
    { name: 'Stephanie', msg: 'May your home always be filled with love, warmth, and happy moments like today.' },
    { name: 'David & Lina', msg: 'So blessed to know you both. Wishing you a year of pure happiness.' },
    { name: 'Grandma Yati', msg: 'My dearest ones, may you be blessed with long life and endless joy.' }
  ];
  let poolIndex = 0;

  function loadMoreWishes() {
    const batch = wishPool.slice(poolIndex, poolIndex + 5);
    batch.forEach(function (w, i) {
      const el = buildWish(w.name, w.msg, true);
      el.style.animationDelay = (i * 0.08) + 's';
      wishList.appendChild(el);
    });
    poolIndex += batch.length;
    if (poolIndex >= wishPool.length) loadMore.hidden = true;
  }
  if (loadMore) loadMore.addEventListener('click', loadMoreWishes);

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('name').value.trim();
    const rsvp = (form.querySelector('input[name="rsvp"]:checked') || {}).value;

    if (!name) {
      document.getElementById('name').focus();
      shake(document.getElementById('name'));
      return;
    }
    if (!rsvp) {
      shake(form.querySelector('.rsvp-options'));
      return;
    }

    const msgs = {
      attending: 'We are overjoyed that you’ll be joining us. See you on the dance floor!',
      maybe: 'We hope the stars align so you can celebrate with us. Fingers crossed!',
      unable: 'We’ll miss you dearly, but your warm wishes mean the world to us.'
    };
    thanksMsg.textContent = (name ? name + ', ' : '') + msgs[rsvp];

    const wishes = document.getElementById('wishes').value.trim();
    if (wishes) addWish(name, wishes);

    form.style.transition = 'opacity 0.5s var(--ease), transform 0.5s var(--ease)';
    form.style.opacity = '0';
    form.style.transform = 'scale(0.97)';
    setTimeout(() => {
      form.style.display = 'none';
      thanks.classList.add('show');
    }, 480);
  });

  resetBtn.addEventListener('click', function () {
    thanks.classList.remove('show');
    form.reset();
    form.style.display = '';
    requestAnimationFrame(() => { form.style.opacity = '1'; form.style.transform = 'scale(1)'; });
  });

  function shake(el) {
    if (!el) return;
    el.animate([
      { transform: 'translateX(0)' },
      { transform: 'translateX(-7px)' },
      { transform: 'translateX(7px)' },
      { transform: 'translateX(-5px)' },
      { transform: 'translateX(0)' }
    ], { duration: 380, easing: 'ease-in-out' });
  }

  /* ---------- Keep scroll locked at top until opened ---------- */
  window.addEventListener('scroll', function () {
    if (body.classList.contains('locked')) window.scrollTo(0, 0);
  }, { passive: true });
})();
</script>
</body>
</html>
