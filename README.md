# Thợ Khóa 247 - WordPress Theme

Theme WordPress cho landing page dịch vụ sửa khóa, xây dựng theo cấu trúc của
suakhoanhanh.com: trang chủ nhiều section (hero, dịch vụ nổi bật, lưới dịch
vụ, giới thiệu, khu vực phục vụ, sản phẩm nổi bật, blog, đánh giá khách hàng,
gallery), trang chi tiết sản phẩm và trang bài viết có mục lục + CTA.

## Cài đặt

1. Copy thư mục `wp-content/themes/thokhoa247` vào `wp-content/themes/` của
   site WordPress.
2. Vào **Giao diện > Theme**, kích hoạt theme **Thợ Khóa 247**.
3. (Khuyến nghị) Cài plugin **Advanced Custom Fields** (free) để có thể chỉnh
   sửa: hero, ảnh giới thiệu, gallery cửa hàng/dự án, giá & thông số kỹ thuật
   sản phẩm, đánh giá khách hàng — theme vẫn chạy bình thường nếu chưa cài,
   chỉ hiển thị nội dung mặc định.

## Cấu hình menu

Vào **Giao diện > Menu**, tạo menu với các mục: Trang chủ, Khóa ô tô, Sửa
khóa xe máy, Sửa khóa két sắt, Sửa khóa cửa, Sửa khóa cửa cuốn, Sản phẩm,
Liên hệ — rồi gán vào vị trí **Menu chính**. Có thể thêm submenu (dropdown)
cho từng mục.

## Nội dung quản lý qua WP admin

- **Bài viết (Posts)**: hiển thị ở section "Blog tin tức" trang chủ và trang
  `single.php`. Đặt 3 bài vào category slug `dich-vu-noi-bat` để hiển thị ở
  section "Dịch vụ nổi bật" đầu trang chủ.
- **Sản phẩm**: CPT `san-pham` (menu "Sản phẩm" trong WP admin). Gán taxonomy
  **Loại sản phẩm** = `Bán chạy` hoặc `Khóa đồng` để hiển thị đúng tab ở
  trang chủ. Nhập giá gốc/giá sale, ảnh thumbnail, thông số kỹ thuật qua ACF.
- **Đánh giá khách hàng**: CPT `danh-gia`, nhập tên (title), nội dung
  (content), vai trò/khu vực (ACF field "vai_tro"), ảnh đại diện
  (Featured Image).
- **Khu vực phục vụ**: taxonomy `khu-vuc` gắn cho Posts. Tạo 2 term cha
  "Sửa khóa tại Hà Nội" / "Sửa khóa tại Sài Gòn" (theme tự tạo khi kích
  hoạt) và thêm term con là tên quận, gắn vào bài viết tương ứng để link
  trực tiếp tới bài viết về khu vực đó.
- **Tuỳ chỉnh trang chủ** (cần ACF): vào menu **Trang chủ** trong WP admin để
  nhập tiêu đề/ảnh Hero, nội dung giới thiệu, gallery cửa hàng & dự án.

## Cấu trúc theme

```
wp-content/themes/thokhoa247/
├── style.css              # Theme header + import
├── functions.php          # Setup, CPT, taxonomy, enqueue assets
├── header.php / footer.php
├── front-page.php         # Trang chủ - ráp các template-parts
├── single.php              # Trang bài viết (mục lục + CTA giữa bài)
├── single-san-pham.php     # Chi tiết sản phẩm
├── archive-san-pham.php    # Danh sách sản phẩm
├── index.php               # Danh sách bài viết / fallback
├── template-parts/         # Các section trang chủ
├── inc/
│   ├── default-content.php # Nội dung mặc định (fallback)
│   └── acf-fields.php       # Đăng ký field group ACF
└── assets/
    ├── css/style.css
    ├── js/main.js
    └── images/              # Ảnh placeholder
```

## Thay đổi nội dung mặc định không cần ACF

Nếu chưa cài ACF, sửa các hàm trong `inc/default-content.php` (hotline, danh
sách dịch vụ, quận, cửa hàng, đánh giá mẫu) để cập nhật nội dung nhanh.
