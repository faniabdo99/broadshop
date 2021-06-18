<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @forelse ($AllProducts as $Product)
    <url>
       <loc>{{route('product.single',[$Product->slug,$Product->id])}}</loc>
       <lastmod>{{$Product->updated_at->format('Y-m-d')}}</lastmod>
       <changefreq>daily</changefreq>
       <priority>1</priority>
    </url>
  @empty

  @endforelse
  @forelse ($AllCategories as $Category)
    <url>
        <loc>{{route('products',$Category->slug)}}</loc>
        <lastmod>{{$Category->updated_at->format('Y-m-d')}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    @empty

    @endforelse
    @forelse ($AllPosts as $Post)
    <url>
        <loc>{{route('blog.single',[$Post->slug,$Post->id])}}</loc>
        <lastmod>{{$Post->updated_at->format('Y-m-d')}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    @empty

    @endforelse
   <url>
      <loc>https://broadshop.be</loc>
      <lastmod>2021-06-15</lastmod>
      <changefreq>daily</changefreq>
   </url>
   <url>
      <loc>https://broadshop.be/about</loc>
      <lastmod>2021-06-15</lastmod>
      <changefreq>weekly</changefreq>
   </url>
   <url>
      <loc>https://broadshop.be/contact</loc>
      <lastmod>2021-06-15</lastmod>
      <changefreq>weekly</changefreq>
   </url>
   <url>
      <loc>https://broadshop.be/products</loc>
      <lastmod>2021-06-15</lastmod>
      <changefreq>weekly</changefreq>
   </url>
   <url>
        <loc>https://broadshop.be/terms-and-conditions</loc>
        <lastmod>2021-06-15</lastmod>
        <changefreq>weekly</changefreq>
    </url>
</urlset>