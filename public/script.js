/* ============================================================
PART 1 — Non-RSVP page logic (vanilla JS, unchanged)
============================================================ */
(function () {
    'use strict';
    const body = document.body;
    const heroSection = document.getElementById('hero');
    const openBtn = document.getElementById('openBtn');
    const fadeOverlay = document.getElementById('fadeOverlay');
    const detailsSection = document.getElementById('details');
    const scrollHint = document.getElementById('scrollHint');
    const musicToggle = document.getElementById('musicToggle');

    const ICONS = [
        'fa-solid fa-cake-candles', 'fa-solid fa-gift', 'fa-regular fa-heart',
        'fa-solid fa-star', 'fa-solid fa-champagne-glasses', 'fa-regular fa-star'
    ];

    function seedFloats(layerId, count) {
        const layer = document.getElementById(layerId);
        if (!layer) return;
        layer.style.cssText = 'position:absolute;inset:0;z-index:1;pointer-events:none;overflow:hidden;';
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
        let audio = null,
            playing = false;

        function play() {
            if (!audio) {
                audio = new Audio('backsound.mp3');
                audio.loop = true;
                audio.preload = 'auto';
                audio.volume = 0.55;
            }
            playing = true;
            audio.play().catch(() => { });
            musicToggle.classList.add('playing');
        }

        function pause() {
            playing = false;
            if (audio) audio.pause();
            musicToggle.classList.remove('playing');
        }

        function toggle() {
            playing ? pause() : play();
        }
        return {
            play,
            pause,
            toggle,
            get playing() {
                return playing;
            }
        };
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

    const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                io.unobserve(e.target);
            }
        });
    }, {
        threshold: 0.18
    });
    document.querySelectorAll('.reveal').forEach((el) => io.observe(el));

    let invitationOpenedOnce = false;
    const heroObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.target !== heroSection) return;
            const showOpenBtn = entry.isIntersecting && !invitationOpenedOnce;
            openBtn.classList.toggle('is-hidden', !showOpenBtn);
        });
    }, {
        threshold: 0.55
    });
    if (heroSection) heroObserver.observe(heroSection);

    let opened = false;

    function openInvitation() {
        if (opened) return;
        opened = true;
        invitationOpenedOnce = true;
        openBtn.classList.add('is-hidden');
        fadeOverlay.classList.add('active');
        try {
            Music.play();
        } catch (e) { }
        setTimeout(() => {
            body.classList.remove('locked');
            scrollHint.classList.add('show');
            detailsSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            setTimeout(() => fadeOverlay.classList.remove('active'), 350);
            setTimeout(() => musicToggle.classList.add('show'), 180);
        }, 750);
    }
    openBtn.addEventListener('click', openInvitation);

    window.addEventListener('pageshow', () => {
        if (!opened) window.scrollTo(0, 0);
    });
    window.addEventListener('load', () => {
        if (!opened) window.scrollTo(0, 0);
    });
    window.addEventListener('scroll', function () {
        if (body.classList.contains('locked')) window.scrollTo(0, 0);
    }, {
        passive: true
    });
})();


/* ============================================================
   PART 2 — RSVP Form (Full jQuery)
   ============================================================ */
$(function () {

    /* --- Selectors ----------------------------------------- */
    var $form = $('#rsvpForm');
    var $thanks = $('#thanks');
    var $thanksMsg = $('#thanksMsg');
    var $resetBtn = $('#resetBtn');
    var $wishList = $('#wishList');
    var $loadMore = $('#loadMore');
    var $submitBtn = $form.find('.submit-btn');
    var $nameInput = $('#name');
    var $wishInput = $('#wishes');
    var $nameAlert = $('#nameAlert');
    var $wishAlert = $('#wishAlert');
    var $attendAlert = $('#attendAlert');
    var token = $('input[name="_token"]').val();

    /* --- Guest name from URL -------------------------------- */
    var params = new URLSearchParams(location.search);
    var raw = params.get('to');
    var clean = raw ? raw.replace(/[<>]/g, '').trim().slice(0, 60) : '';
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

        var name = $.trim($nameInput.val());
        var wish = $.trim($wishInput.val());
        var attend = $form.find('input[name="attend"]:checked').val();
        var valid = true;

        /* Condition 1: show alert under each unfilled field */
        if (!name) {
            showAlert($nameAlert, 'Please fill in your name.');
            valid = false;
        }
        if (!wish) {
            showAlert($wishAlert, 'Please write your wish.');
            valid = false;
        }
        if (!attend && attend !== '0') {
            showAlert($attendAlert, 'Please choose whether you will join us.');
            valid = false;
        }

        if (!valid) {
            return null;
        }

        return {
            name: name,
            wish: wish,
            attend: attend
        };
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
        /* Always prevent default & bubbling first — before any guard/return */
        e.preventDefault();
        e.stopPropagation();

        /* Guard: already submitting */
        if ($submitBtn.hasClass('is-loading')) return;

        var data = validateForm();
        if (!data) return; /* Condition 1 failed — alerts shown */

        /* Condition 2: disable button & show spinner */
        setSubmitLoading(true);

        $.ajax({
            url: $('#rsvpForm').data('action'),
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': token
            },
            data: {
                _token: token,
                name: data.name,
                wish: data.wish,
                attend: data.attend
            }
        })
            .done(function () {
                /* Hapus placeholder "Be the first to leave a wish." jika ada */
                $wishList.find('.wish').filter(function () {
                    return $(this).find('.wish-name').text().trim() === 'Christina & Elnathan';
                }).remove();

                /* Prepend new wish to the wall */
                var $el = buildWishEl(data.name, data.wish);
                $wishList.prepend($el);
                requestAnimationFrame(function () {
                    $el.addClass('show');
                });

                if ($loadMore.prop('hidden')) $loadMore.prop('hidden', false);

                /* Condition 3: show Thank You screen */
                $thanksMsg.text(data.name + ', your wish has been received.');
                $form.addClass('is-fading-out');

                setTimeout(function () {
                    $form.addClass('is-hidden');
                    setSubmitLoading(false);
                    $thanks.addClass('show');

                    /* Scroll langsung ke area Warm Wishes */
                    setTimeout(function () {
                        var $wall = $('.wishes-wall');
                        if ($wall.length) {
                            window.scrollTo({
                                top: $wall.offset().top - 32,
                                behavior: 'smooth'
                            });
                        }
                    }, 600);
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

    /* Enter on text inputs submits (but not textarea) */
    $form.on('keydown', function (e) {
        if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
            e.preventDefault(); /* Prevent native form submit / page reload before handler runs */
            handleWishSubmit(e);
        }
    });

    /* --- Live-clear alerts as user types ------------------ */
    $nameInput.on('input', function () {
        $nameAlert.text('').prop('hidden', true).removeClass('show');
    });
    $wishInput.on('input', function () {
        $wishAlert.text('').prop('hidden', true).removeClass('show');
    });
    $form.find('input[name="attend"]').on('change', function () {
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
            requestAnimationFrame(function () {
                $w.addClass('show');
            });
        });
        if (!$wishList.find('.wish.is-hidden').length) {
            $loadMore.prop('hidden', true);
        }
    });

});