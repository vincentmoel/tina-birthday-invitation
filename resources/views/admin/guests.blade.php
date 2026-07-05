<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Tamu</title>
    <style>
        body{margin:0;font-family:Inter,system-ui,sans-serif;background:linear-gradient(135deg,#f8efe7,#fff7f0 45%,#eef4ff);color:#1f2937}
        .wrap{max-width:1200px;margin:0 auto;padding:32px}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:24px}
        .card{background:rgba(255,255,255,.8);backdrop-filter:blur(10px);border:1px solid rgba(15,23,42,.08);border-radius:20px;padding:20px;box-shadow:0 20px 50px rgba(15,23,42,.08)}
        h1,h2{margin:0 0 16px}
        input,textarea,button{width:100%;box-sizing:border-box;border-radius:12px;border:1px solid #d1d5db;padding:12px 14px;font:inherit}
        textarea{min-height:120px}
        button{background:#111827;color:#fff;border:none;font-weight:600;cursor:pointer}
        .row{display:grid;grid-template-columns:1fr 1fr auto auto auto;gap:10px;align-items:center}
        .actions{display:flex;gap:8px;flex-wrap:wrap}
        .actions form,.actions a{display:inline-block}
        .btn{padding:10px 12px;border-radius:10px;text-decoration:none;color:#fff;background:#374151}
        .btn.green{background:#16a34a}.btn.red{background:#dc2626}.btn.blue{background:#2563eb}
        table{width:100%;border-collapse:collapse}
        th,td{padding:12px;border-bottom:1px solid #e5e7eb;text-align:left;vertical-align:top}
        .muted{color:#6b7280;font-size:14px}
        .status{margin:0 0 16px;padding:12px 14px;border-radius:12px;background:#ecfdf5;color:#065f46}
        @media (max-width: 900px){.grid,.row{grid-template-columns:1fr}.wrap{padding:16px}}
    </style>
</head>
<body>
<div class="wrap">
    <h1>Dashboard Admin Tamu</h1>
    <p class="muted">Nomor akan dibersihkan menjadi format lokal, contoh <code>+62 815-6617-019</code>, <code>628156617019</code>, atau <code>08156617019</code> akan tersimpan sebagai <code>08156617019</code>.</p>

    @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    <div class="grid">
        <div class="card">
            <h2>Tambah / Update Tamu</h2>
            <form method="POST" action="{{ $editingGuest ? route('admin.guests.update', $editingGuest) : route('admin.guests.store') }}">
                @csrf
                @if ($editingGuest)
                    @method('PUT')
                @endif
                <div class="row">
                    <input name="name" placeholder="Nama" value="{{ old('name', $editingGuest->name ?? '') }}">
                    <input name="phone" placeholder="Nomor telepon" value="{{ old('phone', $editingGuest->phone ?? '') }}">
                    <button type="submit">{{ $editingGuest ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
            @if ($editingGuest)
                <p class="muted" style="margin-top:12px">Sedang mengedit: {{ $editingGuest->name }}. <a href="{{ route('admin.guests.index') }}">Batal edit</a></p>
            @endif
        </div>

        <div class="card">
            <h2>Default Message</h2>
            <form method="POST" action="{{ route('admin.settings.update') }}">
                @csrf
                <div style="display:grid;gap:12px">
                    <div>
                        <label class="muted">Template Pesan</label>
                        <textarea name="message_template">{{ old('message_template', $template) }}</textarea>
                    </div>
                    <div>
                        <label class="muted">Default URL</label>
                        <input name="default_url" value="{{ old('default_url', $defaultUrl) }}" placeholder="birthdaytina.com">
                    </div>
                    <button type="submit">Simpan Setting</button>
                </div>
            </form>
            <p class="muted" style="margin-top:12px">Placeholder yang didukung: <code>{nama}</code> dan <code>{url}</code>.</p>
        </div>
    </div>

    <div class="card" style="margin-top:24px">
        <h2>Daftar Penerima</h2>
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($guests as $guest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->phone }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn green" href="{{ route('admin.guests.send', $guest) }}" rel="noopener">Send</a>
                            <a class="btn blue" href="{{ route('admin.guests.index', ['edit' => $guest->id]) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.guests.destroy', $guest) }}" onsubmit="return confirm('Hapus tamu ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn red" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="muted">Belum ada tamu tersimpan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
