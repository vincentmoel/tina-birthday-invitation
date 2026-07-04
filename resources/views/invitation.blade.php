<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#F8F7F5" />
    <title>Christina &amp; Elnathan Grateful Party</title>
    <meta name="description"
        content="Your Presence Means Everything" />
    <meta property="og:title" content="Christina &amp; Elnathan Grateful Party" />
    <meta property="og:description"
        content="Your Presence Means Everything" />
    <meta property="og:image" content="{{ asset('meta-photo.jpg') }}" />
    <meta property="og:image:alt" content="Christina and Elnathan Grateful Party invitation photo" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Christina &amp; Elnathan Grateful Party" />
    <meta name="twitter:description"
        content="Your Presence Means Everything" />
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
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('styles.css') }}" />
</head>

<body class="locked">
    <div id="fadeOverlay"></div>
    <button class="music-toggle" id="musicToggle" aria-label="Toggle music">
        <img src="{{ asset('piringan-hitam.png') }}" alt="" aria-hidden="true">
    </button>
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
            <div class="names"><span class="name">Christina</span><span class="amp">&amp;</span><span
                    class="name">Elnathan</span></div>
            <h1 class="hero-title">Grateful<br><em>Party</em></h1>
            <div class="recipient"><span class="eyebrow">Dear</span><span class="recipient-name"
                    id="guestName">Guest</span></div>
            <button class="btn btn-primary open-btn" id="openBtn"><i class="fa-solid fa-gift"></i> Open
                Invitation</button>
        </div>
        <div class="scroll-hint" id="scrollHint"><span>Scroll</span><i class="fa-solid fa-chevron-down"></i></div>
    </section>
    <section class="section" id="details">
        <div class="float-layer" id="detailsFloat"></div>
        <div class="section-head reveal"><span class="eyebrow">The Party</span>
            <h2>Save the <em>Date</em></h2>
        </div>
        <div class="invite-date reveal d1"><span class="id-top">Thursday</span><span class="id-day">23</span><span
                class="id-month">July 2026</span></div>
        <div class="invite-meta">
            <div class="meta reveal d1"><span class="m-label"><i class="fa-solid fa-clock"></i> Time</span><span
                    class="m-value">17:30 WIB</span></div>
            <div class="meta reveal d2"><span class="m-label"><i class="fa-solid fa-shirt"></i> Dress Code</span><span
                    class="m-value">Pink or Brown</span></div>
            <div class="meta reveal d3"><span class="m-label"><i class="fa-solid fa-location-dot"></i>
                    Venue</span><span class="m-value">Efrata Ballroom , House of Susan<span class="m-sub">Jl. Kh
                        Ahmad Dahlan No.49</span></span></div>
        </div>
        <a class="btn map-btn reveal d5" href="https://maps.app.goo.gl/F5bVrmcS435JCHD57" target="_blank"
            rel="noopener"><i class="fa-solid fa-location-dot"></i> Open in Google Maps</a>
    </section>
    <section class="section" id="rsvp">
        <div class="float-layer" id="rsvpFloat"></div>
        <div class="rsvp-wrap">
            <div class="section-head reveal" style="margin-bottom:clamp(2.8rem,7vh,3.6rem);"><span
                    class="eyebrow">RSVP &amp; Wishes</span>
                <h2>Your Presence Means Everything</h2>
            </div>
            <div class="rsvp-stage">
                <form id="rsvpForm" class="reveal d1 rsvp-form" novalidate autocomplete="off" data-action="{{ route('wishes.store') }}">
                    @csrf
                    <div class="field">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" placeholder="How should we address you?"
                            required autocomplete="off" />
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
                            <label class="opt"><input type="radio" name="attend" value="1" required
                                    autocomplete="off" /><span class="opt-box"><span class="opt-dot"></span><span
                                        class="opt-text">Attending</span></span></label>
                            <label class="opt"><input type="radio" name="attend" value="0"
                                    autocomplete="off" /><span class="opt-box"><span class="opt-dot"></span><span
                                        class="opt-text">Unable to Attend</span></span></label>
                        </div>
                        <div class="field-alert" id="attendAlert" role="alert" aria-live="polite" hidden></div>
                    </div>
                    <button type="button" class="btn btn-primary submit-btn" data-label="Send Wishes">
                        <span class="btn-label">Send Wishes</span>
                        <span class="btn-spinner" aria-hidden="true"></span>
                    </button>
                </form>
                <div class="thanks" id="thanks"><span class="flourish"></span>
                    <h3>Thank You</h3>
                    <p id="thanksMsg">Your wishes have been received. We can't wait to celebrate with you.</p><button
                        class="reset" id="resetBtn">Send another wish</button>
                </div>
            </div>
            <div class="wishes-wall reveal d2">
                <div class="wishes-head">
                    <h3 class="wishes-title">Warm Wishes</h3><span class="wishes-line"></span>
                </div>
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

    <script src="{{ asset('script.js') }}?time=" . {{ now() }}></script>
</body>

</html>
