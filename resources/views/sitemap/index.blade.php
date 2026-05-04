{{-- <?xml version="1.0" encoding="UTF-8"?> --}}
@php echo '<?xml version="1.0" encoding="UTF-8" @endphp' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Página de Inicio -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Página de Convenios -->
    <url>
        <loc>{{ route('convenios') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Página de Contacto -->
    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.5</priority>
    </url>

    <!-- Página Acerca de Nosotros -->
    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.6</priority>
    </url>
    <!-- Página Acerca de Certificaciones -->
    <url>
        <loc>{{ route('certificados') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.6</priority>
    </url>
    <!-- Página Acerca de Documentos -->
    <url>
        <loc>{{ route('documents') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.6</priority>
    </url>
    <!-- Página Acerca de Noticias -->
    <url>
        <loc>{{ route('news.index') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.6</priority>
    </url>

    <!-- Cursos Publicados -->
    @foreach ($courses as $course)
        <url>
            <loc>{{ route('course.show', $course) }}</loc>
            <lastmod>{{ $course->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- Noticias Publicadas -->
    @foreach ($news as $new)
        <url>
            <loc>{{ route('news.show', $new) }}</loc>
            <lastmod>{{ $new->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>
