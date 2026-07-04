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
    <div class="rsvp-stage">
      <form id="rsvpForm" class="reveal d1 rsvp-form" novalidate autocomplete="off">
        @csrf
        <div class="field">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="How should we address you?" required autocomplete="off" />
          <div class="field-alert" id="nameAlert" role="alert" aria-live="polite" hidden></div>
        </div>
        <div class="field">
          <label for="wishes">Birthday Wishes</label>
          <textarea id="wishes" name="wish" placeholder="Write something from the heart..." autocomplete="off"></textarea>
          <div class="field-alert" id="wishAlert" role="alert" aria-live="polite" hidden></div>
        </div>
        <div class="field">
          <label>Will You Join Us?</label>
          <div class="rsvp-options">
            <label class="opt"><input type="radio" name="attend" value="1" required autocomplete="off" /><span class="opt-box"><span class="opt-dot"></span><span class="opt-text">Attending</span></span></label>
            <label class="opt"><input type="radio" name="attend" value="0" autocomplete="off" /><span class="opt-box"><span class="opt-dot"></span><span class="opt-text">Unable to Attend</span></span></label>
          </div>
          <div class="field-alert" id="attendAlert" role="alert" aria-live="polite" hidden></div>
        </div>
        <button type="button" class="btn btn-primary submit-btn" data-label="Send Wishes">
          <span class="btn-label">Send Wishes</span>
          <span class="btn-spinner" aria-hidden="true"></span>
        </button>
      </form>
      <div class="thanks" id="thanks"><span class="flourish"></span><h3>Thank You</h3><p id="thanksMsg">Your wishes have been received. We can't wait to celebrate with you.</p><button class="reset" id="resetBtn">Send another wish</button></div>
    </div>
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

{{-- ============================================================
     jQuery CDN
     ============================================================ --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
/* ============================================================
   PART 1 — Non-RSVP page logic (vanilla JS, unchanged)
   ============================================================ */
(function () {
  'use strict';
  const body          = document.body;
  const heroSection   = document.getElementById('hero');
  const openBtn       = document.getElementById('openBtn');
  const fadeOverlay   = document.getElementById('fadeOverlay');
  const detailsSection= document.getElementById('details');
  const scrollHint    = document.getElementById('scrollHint');
  const musicToggle   = document.getElementById('musicToggle');

  const ICONS = [
    'fa-solid fa-cake-candles','fa-solid fa-gift','fa-regular fa-heart',
    'fa-solid fa-star','fa-solid fa-champagne-glasses','fa-regular fa-star'
  ];

  function seedFloats(layerId, count) {
    const layer = document.getElementById(layerId);
    if (!layer) return;
    layer.style.cssText = 'position:absolute;inset:0;z-index:1;pointer-events:none;overflow:hidden;';
    for (let i = 0; i < count; i++) {
      const el = document.createElement('i');
      el.className = 'float ' + ICONS[Math.floor(Math.random() * ICONS.length)];
      el.style.left   = Math.random() * 100 + '%';
      el.style.top    = (60 + Math.random() * 50) + '%';
      el.style.fontSize = (10 + Math.random() * 18) + 'px';
      el.style.animationDuration = (12 + Math.random() * 12) + 's';
      el.style.animationDelay   = (Math.random() * 10) + 's';
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
      dot.style.width  = size + 'px';
      dot.style.height = size + 'px';
      dot.style.left   = Math.random() * 100 + '%';
      dot.style.bottom = '-10px';
      dot.style.animationDuration = (10 + Math.random() * 12) + 's';
      dot.style.animationDelay   = (Math.random() * 12) + 's';
      p.appendChild(dot);
    }
  })();

  const Music = (function () {
    let audio = null, playing = false;
    function play() {
      if (!audio) {
        audio = new Audio('{{ asset('backsound.mp3') }}');
        audio.loop = true; audio.preload = 'auto'; audio.volume = 0.55;
      }
      playing = true; audio.play().catch(() => {});
      musicToggle.classList.add('playing');
    }
    function pause() { playing = false; if (audio) audio.pause(); musicToggle.classList.remove('playing'); }
    function toggle() { playing ? pause() : play(); }
    return { play, pause, toggle, get playing() { return playing; } };
  })();

  musicToggle.addEventListener('click', () => Music.toggle());

  let resumeOnReturn = false;
  function stopMusicIfNeeded()   { resumeOnReturn = Music.playing; if (Music.playing) Music.pause(); }
  function resumeMusicIfNeeded() { if (resumeOnReturn && !Music.playing) { resumeOnReturn = false; Music.play(); } }
  document.addEventListener('visibilitychange', () => { if (document.hidden) stopMusicIfNeeded(); else resumeMusicIfNeeded(); });
  window.addEventListener('pagehide',    stopMusicIfNeeded);
  window.addEventListener('beforeunload',stopMusicIfNeeded);

  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
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

  window.addEventListener('pageshow', () => { if (!opened) window.scrollTo(0, 0); });
  window.addEventListener('load',     () => { if (!opened) window.scrollTo(0, 0); });
  window.addEventListener('scroll', function () {
    if (body.classList.contains('locked')) window.scrollTo(0, 0);
  }, { passive: true });
})();


/* ============================================================
   PART 2 — RSVP Form (Full jQuery)
   ============================================================ */
$(function () {

  /* --- Selectors ----------------------------------------- */
  var $form        = $('#rsvpForm');
  var $thanks      = $('#thanks');
  var $thanksMsg   = $('#thanksMsg');
  var $resetBtn    = $('#resetBtn');
  var $wishList    = $('#wishList');
  var $loadMore    = $('#loadMore');
  var $submitBtn   = $form.find('.submit-btn');
  var $nameInput   = $('#name');
  var $wishInput   = $('#wishes');
  var $nameAlert   = $('#nameAlert');
  var $wishAlert   = $('#wishAlert');
  var $attendAlert = $('#attendAlert');
  var token        = $('input[name="_token"]').val();

  /* --- Guest name from URL -------------------------------- */
  var params = new URLSearchParams(location.search);
  var raw    = params.get('to');
  var clean  = raw ? raw.replace(/[<>]/g, '').trim().slice(0, 60) : '';
  $('#guestName').text(clean || 'Guest');

  /* -------------------------------------------------------
     Helper: toggle loading state on submit button
     - Disables button so it cannot be double-clicked
     - Adds .is-loading → CSS shows spinner, hides label
     - Changes label text to "Sending…"
     BUG FIX: original re-enabled button inside finally{} AFTER
     hiding the form, causing a visible flicker on the thanks screen.
     Now we only call setSubmitLoading(false) at the right moments.
  ------------------------------------------------------- */
  function setSubmitLoading(on) {
    $submitBtn
      .prop('disabled', on)
      .attr('aria-busy', on ? 'true' : 'false')
      .toggleClass('is-loading', on);
    $submitBtn.find('.btn-label').text(on ? 'Sending…' : $submitBtn.data('label'));
  }

  /* -------------------------------------------------------
     Helper: clear all field alerts and aria-invalid attrs
  ------------------------------------------------------- */
  function clearFieldAlerts() {
    $nameAlert.text('').prop('hidden', true).removeClass('show');
    $wishAlert.text('').prop('hidden', true).removeClass('show');
    $attendAlert.text('').prop('hidden', true).removeClass('show');
    $nameInput.removeAttr('aria-invalid');
    $wishInput.removeAttr('aria-invalid');
    $form.find('input[name="attend"]').removeAttr('aria-invalid');
  }

  /* -------------------------------------------------------
     Helper: show an alert element with a message
  ------------------------------------------------------- */
  function showAlert($el, msg) {
    $el.text(msg).prop('hidden', false).addClass('show');
  }

  /* -------------------------------------------------------
     Validation — checks ALL fields at once so every error
     surfaces simultaneously (improvement over original which
     bailed on the first invalid field).
     Returns { name, wish, attend } on success, or null on fail.
  ------------------------------------------------------- */
  function validateForm() {
    clearFieldAlerts();

    var name   = $.trim($nameInput.val());
    var wish   = $.trim($wishInput.val());
    var attend = $form.find('input[name="attend"]:checked').val();
    var valid  = true;

    /* Condition 1: show alert under each unfilled field */
    if (!name) {
      $nameInput.attr('aria-invalid', 'true');
      showAlert($nameAlert, 'Please fill in your name.');
      valid = false;
    }
    if (!wish) {
      $wishInput.attr('aria-invalid', 'true');
      showAlert($wishAlert, 'Please write your wish.');
      valid = false;
    }
    if (attend === undefined) {
      $form.find('input[name="attend"]').attr('aria-invalid', 'true');
      showAlert($attendAlert, 'Please choose whether you will join us.');
      valid = false;
    }

    if (!valid) {
      /* Focus the first invalid element for accessibility */
      $form.find('[aria-invalid="true"]').first().trigger('focus');
      return null;
    }

    return { name: name, wish: wish, attend: attend };
  }

  /* -------------------------------------------------------
     Build a wish card jQuery element
  ------------------------------------------------------- */
  function buildWishEl(name, msg) {
    return $('<div class="wish new">')
      .append($('<p class="wish-msg">').text('\u201C' + msg + '\u201D'))
      .append($('<span class="wish-name">').text(name || 'A Dear Friend'));
  }

  /* -------------------------------------------------------
     Submit handler
  ------------------------------------------------------- */
  function handleWishSubmit(e) {
    e.preventDefault();
    e.stopPropagation();

    /* Guard: already submitting */
    if ($submitBtn.hasClass('is-loading')) return;

    var data = validateForm();
    if (!data) return; /* Condition 1 failed — alerts shown */

    /* Condition 2: disable button & show spinner */
    setSubmitLoading(true);

    $.ajax({
      url:      "{{ route('wishes.store') }}",
      method:   'POST',
      dataType: 'json',
      headers:  { 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': token },
      data:     { _token: token, name: data.name, wish: data.wish, attend: data.attend }
    })
    .done(function () {
      /* Prepend new wish to the wall */
      var $el = buildWishEl(data.name, data.wish);
      $wishList.prepend($el);
      requestAnimationFrame(function () { $el.addClass('show'); });

      if ($loadMore.prop('hidden')) $loadMore.prop('hidden', false);

      /* Condition 3: show Thank You screen */
      $thanksMsg.text(data.name + ', your wish has been received.');
      $form.addClass('is-fading-out');

      setTimeout(function () {
        $form.addClass('is-hidden');
        setSubmitLoading(false); /* re-enable BEFORE showing thanks */
        $thanks.addClass('show');
      }, 360);
    })
    .fail(function (xhr) {
      /* On error: re-enable so user can retry */
      setSubmitLoading(false);
      var msg = 'Something went wrong. Please try again.';
      if (xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
      showAlert($attendAlert, msg);
    });
  }

  /* --- Bind submit events -------------------------------- */
  $submitBtn.on('click', handleWishSubmit);
  $form.on('submit', handleWishSubmit);

  /* Enter on text inputs submits (but not textarea) */
  $form.on('keydown', function (e) {
    if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
      handleWishSubmit(e);
    }
  });

  /* --- Live-clear alerts as user types ------------------ */
  $nameInput.on('input', function () {
    $(this).removeAttr('aria-invalid');
    $nameAlert.text('').prop('hidden', true).removeClass('show');
  });
  $wishInput.on('input', function () {
    $(this).removeAttr('aria-invalid');
    $wishAlert.text('').prop('hidden', true).removeClass('show');
  });
  $form.find('input[name="attend"]').on('change', function () {
    $form.find('input[name="attend"]').removeAttr('aria-invalid');
    $attendAlert.text('').prop('hidden', true).removeClass('show');
  });

  /* --- Condition 3: reset form after "Send another wish" */
  $resetBtn.on('click', function () {
    $thanks.removeClass('show');
    $form[0].reset();
    $form.removeClass('is-hidden is-fading-out');
    clearFieldAlerts();
    setSubmitLoading(false);
  });

  /* --- Load-more wishes ---------------------------------- */
  $loadMore.on('click', function () {
    var $hidden = $wishList.find('.wish.is-hidden');
    $hidden.slice(0, 5).each(function () {
      var $w = $(this).removeClass('is-hidden');
      requestAnimationFrame(function () { $w.addClass('show'); });
    });
    if (!$wishList.find('.wish.is-hidden').length) {
      $loadMore.prop('hidden', true);
    }
  });

});
</script>
</body>
</html>