# HƯỚNG DẪN SỬ DỤNG & CUSTOM THEME THỢ KHÓA 247

---

## MỤC LỤC
1. [Cài đặt theme](#1-cài-đặt-theme)
2. [Import dữ liệu mẫu](#2-import-dữ-liệu-mẫu)
3. [Cấu hình menu](#3-cấu-hình-menu)
4. [Tùy chỉnh trang chủ (Trang chủ admin)](#4-tùy-chỉnh-trang-chủ)
5. [Banner trang chủ (Hero Slider)](#5-banner-trang-chủ-hero-slider)
6. [Lưới dịch vụ (nền đỏ)](#6-lưới-dịch-vụ-nền-đỏ)
7. [Khu vực phục vụ (Hà Nội / Sài Gòn)](#7-khu-vực-phục-vụ)
8. [Sản phẩm nổi bật](#8-sản-phẩm-nổi-bật)
9. [Đánh giá khách hàng](#9-đánh-giá-khách-hàng)
10. [Gallery ảnh cửa hàng / dự án](#10-gallery-ảnh)
11. [Bài viết & Blog](#11-bài-viết--blog)
12. [Footer & thông tin liên hệ](#12-footer--thông-tin-liên-hệ)
13. [Trang chi tiết sản phẩm](#13-trang-chi-tiết-sản-phẩm)
14. [Trang bài viết đơn](#14-trang-bài-viết-đơn)

---

## 1. CÀI ĐẶT THEME

### Bước 1 — Tải theme
- Tải toàn bộ thư mục `thokhoa247` về máy
- Nén thành file ZIP: `thokhoa247.zip`

### Bước 2 — Upload lên WordPress
1. Vào **WP Admin → Giao diện → Theme**
2. Nhấn **Thêm mới → Upload Theme**
3. Chọn file `thokhoa247.zip` → **Cài đặt ngay**
4. Nhấn **Kích hoạt**

### Bước 3 — Tạo trang chủ tĩnh
1. **Trang → Thêm mới** → Tên: `Trang chủ` → Xuất bản
2. **Cài đặt → Đọc** → "Trang chủ hiển thị" chọn **Trang tĩnh** → Trang chủ: `Trang chủ`
3. Lưu thay đổi

---

## 2. IMPORT DỮ LIỆU MẪU

File `demo-content.xml` có sẵn trong thư mục theme chứa:
- Bài viết mẫu cho 12 quận Hà Nội + 5 quận Sài Gòn
- Taxonomy khu vực (khu-vuc)
- 6 sản phẩm mẫu
- 3 bài dịch vụ nổi bật

### Cách import:
1. Cài plugin **WordPress Importer** (nếu chưa có)
2. Vào **Công cụ → Nhập → WordPress** → Chạy bộ nhập
3. Chọn file `demo-content.xml` từ thư mục theme
4. Tích **Download and import file attachments**
5. Gán tác giả → **Submit**

> ⚠️ Sau import, mỗi bài viết khu vực cần được **gán taxonomy "khu-vuc"** đúng quận để hiện link trên trang chủ.

---

## 3. CẤU HÌNH MENU

### Tạo menu chính:
1. Vào **WP Admin → Giao diện → Menu**
2. Nhấn **Tạo menu mới** → Đặt tên: `Menu chính`
3. Thêm các mục từ cột trái:

```
Trang chủ          → link: /
Khóa Ô Tô         → link bài viết hoặc danh mục
Sửa Khóa Xe Máy   → link danh mục
  ↳ Làm chìa khóa xe Vespa, Fly, Zip tại Hà Nội, TP HCM
  ↳ Sửa khóa xe SH
  ↳ Sửa khóa xe Piaggio
  ↳ Sửa khóa xe máy phân khối lớn
Sửa Khóa Két Sắt  → link bài viết
Sửa Khóa Cửa      → link bài viết
Sửa Khóa Cửa Cuốn → link bài viết
Sản Phẩm          → link: /san-pham/ (archive CPT)
Liên Hệ           → link trang liên hệ
```

4. **Tạo submenu**: Kéo mục con sang phải để thụt vào dưới mục cha
5. Vị trí menu: tích **Main Navigation**
6. **Lưu menu**

---

## 4. TÙY CHỈNH TRANG CHỦ

Toàn bộ nội dung trang chủ được quản lý tại:
**WP Admin → Trang chủ** (menu trái, biểu tượng ngôi nhà)

Các nhóm cài đặt:

| Nhóm | Nội dung |
|------|----------|
| 📞 Thông tin liên hệ | Hotline HN, Hotline SG, Giờ làm việc, Số Zalo |
| 🖼 Banner (Slider) | Tối đa 4 banner, mỗi banner có ảnh + link |
| 🔧 Lưới dịch vụ | Ảnh nền section + 9 dịch vụ (tên, mô tả, ảnh icon, link) |
| 🖼 Hình ảnh cửa hàng | 6 ảnh slider cửa hàng |
| 🖼 Hình ảnh dự án | 6 ảnh slider dự án |
| ℹ️ Giới thiệu | Ảnh giới thiệu + nội dung văn bản |

Sau mỗi thay đổi nhấn **"Lưu tất cả cài đặt"**.

---

## 5. BANNER TRANG CHỦ (HERO SLIDER)

### Thêm/sửa banner:
1. Vào **Trang chủ** (admin)
2. Phần **Banner trang chủ (Slider)**
3. Mỗi banner có:
   - **Ảnh banner**: nhấn "Chọn ảnh" → chọn từ thư viện media
   - **Link**: URL trang đích khi người dùng click vào banner
   - _(Tiêu đề/Phụ đề để trống — ảnh nên có chữ baked-in sẵn)_
4. Lưu cài đặt

> 💡 **Kích thước ảnh đề xuất**: 1920×560px. Ảnh đã có chữ/logo in sẵn — không cần nhập tiêu đề.

> Slider tự động chuyển sau 6 giây. Có nút prev/next và dots để điều hướng.

---

## 6. LƯỚI DỊCH VỤ (NỀN ĐỎ)

Section 3×3 nền đỏ parallax hiển thị 9 dịch vụ chính.

### Sửa ảnh nền section:
1. **Trang chủ** → **Lưới dịch vụ** → "Ảnh nền section dịch vụ"
2. Nhấn "Chọn ảnh" → chọn ảnh tối, kích thước 1600×900px

### Sửa từng dịch vụ (9 ô):
1. **Trang chủ** → **Danh sách dịch vụ trong lưới**
2. Mỗi ô gồm:
   - **Tên**: tiêu đề dịch vụ (in đậm)
   - **Mô tả**: 1-2 câu mô tả ngắn
   - **Link**: URL trang chi tiết dịch vụ
   - **Ảnh icon**: ảnh tròn 64px — nhấn "Chọn ảnh" để upload ảnh thật (ảnh chìa khóa, két sắt, cửa cuốn...)
3. Lưu cài đặt

> 💡 **Ảnh icon đề xuất**: ảnh vuông 200×200px, nền trong/trắng, sẽ tự bo tròn.

---

## 7. KHU VỰC PHỤC VỤ

Hiển thị 2 section: **Sửa Khóa Tại Hà Nội** và **Sửa Khóa Tại Sài Gòn**, mỗi section 12 quận xếp 4 cột.

### Thứ tự quận cố định (không thay đổi được qua admin):
- **Hà Nội**: Hoàn Kiếm → Đống Đa → Ba Đình → Cầu Giấy → Thanh Xuân → Hai Bà Trưng → Tây Hồ → Hà Đông → Long Biên → Hoàng Mai → Từ Liêm → Gia Lâm
- **Sài Gòn**: Q.1 → Q.3 → Q.4 → Q.5 → Q.6 → Q.7 → Q.8 → Q.10 → Q.11 → Q.12 → Tân Bình → Bình Tân

### Cách gắn ảnh và link cho từng quận:

**Cách 1 (khuyến nghị) — Tạo bài viết cho từng quận:**
1. **Bài viết → Thêm mới**
2. Tiêu đề: ví dụ `Sửa Khóa Quận Hoàn Kiếm`
3. **Ảnh đại diện** (Featured Image): upload ảnh chụp quận đó
4. Phần **Khu vực** (taxonomy box bên phải): tích chọn `Hoàn Kiếm`
5. Xuất bản

→ Trang chủ sẽ tự động hiển thị ảnh và gắn link bài viết đó vào card quận.

**Cách 2 — Tìm kiếm theo tên:**
Nếu chưa có taxonomy, theme tự tìm bài viết có tiêu đề chứa tên quận (ví dụ: "Hoàn Kiếm") để lấy link + ảnh.

---

## 8. SẢN PHẨM NỔI BẬT

Theme dùng Custom Post Type **Sản Phẩm** (`san-pham`).

### Thêm sản phẩm:
1. Vào **Sản Phẩm → Thêm mới**
2. Điền:
   - **Tiêu đề**: tên sản phẩm
   - **Nội dung**: mô tả chi tiết
   - **Ảnh đại diện**: ảnh chính sản phẩm
3. Phần **Loại sản phẩm** (bên phải):
   - Tích `ban-chay` → hiện trong tab "Bán Chạy"
   - Tích `khoa-dong` → hiện trong tab "Khóa Đồng"
4. **Custom Fields** (nếu dùng ACF hoặc nhập tay):
   - `gia_sale`: giá bán (VD: `450000`)
   - `gia_goc`: giá gốc/gạch (VD: `650000`)
5. Xuất bản

### Trang chi tiết sản phẩm hiển thị:
- Ảnh chính + ảnh thumbnail (thêm qua **Thư viện ảnh** trong bài viết)
- Giá bán + giá gốc gạch ngang
- 2 nút CTA: Gọi ngay + Nhắn Zalo
- Mô tả sản phẩm
- Sản phẩm liên quan

---

## 9. ĐÁNH GIÁ KHÁCH HÀNG

Theme dùng Custom Post Type **Đánh giá** (`danh-gia`). Hiển thị dạng slider 2 card/slide, tự động chuyển 5 giây.

### Thêm đánh giá:
1. Vào **Đánh giá → Thêm mới**
2. **Tiêu đề**: tên khách hàng (VD: `Chị Bích Hiền`)
3. **Nội dung**: lời đánh giá của khách
4. **Ảnh đại diện**: ảnh avatar khách (tự bo tròn)
5. **Custom Field** `vai_tro`: chức danh/địa chỉ (VD: `Long Biên - Hà Nội`)
6. Xuất bản

> Nếu chưa có đánh giá nào, theme hiển thị 2 đánh giá mẫu mặc định.

---

## 10. GALLERY ẢNH

### Thêm ảnh cửa hàng:
1. **Trang chủ** (admin) → **Hình ảnh cửa hàng**
2. Click từng ô → "Chọn ảnh" → chọn từ Media Library
3. Tối đa 6 ảnh → Lưu

### Thêm ảnh dự án:
1. **Trang chủ** (admin) → **Hình ảnh dự án**
2. Tương tự, tối đa 6 ảnh

> Gallery hiển thị dạng slider: ảnh lớn bên trái, thumbnail nhỏ bên phải, dots điều hướng bên dưới.

---

## 11. BÀI VIẾT & BLOG

### Thêm bài viết:
1. **Bài viết → Thêm mới**
2. Viết nội dung bình thường
3. **Danh mục**: chọn `tin-tuc` để hiện ở section Blog trang chủ
4. **Ảnh đại diện**: bắt buộc để hiện thumbnail
5. Xuất bản

### Gắn vào menu:
1. **Giao diện → Menu**
2. Cột trái → **Bài viết** → tích bài cần thêm → **Thêm vào menu**
3. Kéo vào vị trí muốn (kéo sang phải = submenu)
4. Lưu menu

### Section Blog trang chủ:
Tự động lấy **3 bài viết mới nhất** thuộc danh mục `tin-tuc`. Không cần cấu hình thêm.

---

## 12. FOOTER & THÔNG TIN LIÊN HỆ

### Hotline hiển thị ở:
- Top bar (header trên cùng)
- Section CTA (dải cam dưới hero)
- Footer
- Nút chat nổi Zalo/Phone

### Thay đổi hotline:
1. **Trang chủ** (admin) → **Thông tin liên hệ**
2. Điền Hotline Hà Nội, Hotline Sài Gòn, Giờ làm việc, Số Zalo
3. Lưu

### Địa chỉ cửa hàng trong footer:
Hiện đang dùng dữ liệu mặc định trong code. Để thay đổi, sửa file:
`inc/default-content.php` → hàm `thokhoa247_default_stores()`

---

## 13. TRANG CHI TIẾT SẢN PHẨM

File template: `single-san-pham.php`

Cấu trúc trang:
```
[Ảnh chính] [Ảnh thumbnail nhỏ x3]
[Tên sản phẩm]
[Giá bán]  [Giá gốc gạch]
[Nút: Gọi ngay 0919.188.881]  [Nút: Nhắn Zalo]
[Tab: Mô tả | Thông số]
[Sản phẩm liên quan]
```

### Thêm ảnh thumbnail:
Trong trang chỉnh sửa sản phẩm, phần **Thư viện ảnh** (Gallery) → thêm các ảnh phụ.
Template tự lấy và hiển thị dưới ảnh chính.

### Giá sản phẩm:
Thêm Custom Fields (dùng ACF hoặc plugin Custom Fields):
- `gia_sale` = giá bán (số nguyên, VD: `450000`)
- `gia_goc` = giá cũ gạch ngang (VD: `650000`)

---

## 14. TRANG BÀI VIẾT ĐƠN

File template: `single.php`

Cấu trúc trang:
```
[Breadcrumb]
[Tiêu đề bài viết]
[Mục lục tự động] | [Nội dung bài viết]
                   | [Box CTA giữa bài: Gọi ngay]
                   | [Bài viết liên quan]
[Sidebar: Dịch vụ liên quan + Hotline]
```

Mục lục được tự động tạo từ các thẻ `<h2>`, `<h3>` trong nội dung.

---

## LƯU Ý CHUNG

| Vấn đề | Giải pháp |
|--------|-----------|
| Trang chủ trống | Cài đặt → Đọc → Trang tĩnh → chọn "Trang chủ" |
| Menu không hiện | Giao diện → Menu → gán vị trí "Main Navigation" |
| Khu vực không có ảnh | Tạo bài viết + gán taxonomy "khu-vuc" + đặt ảnh đại diện |
| Sản phẩm không hiện tab | Gán taxonomy "loai-san-pham": `ban-chay` hoặc `khoa-dong` |
| Đánh giá không hiện | Tạo CPT "Đánh giá" và xuất bản ít nhất 1 bài |
| Gallery không hiện | Upload ảnh vào Trang chủ (admin) → mục Gallery |
| Nút Zalo không hiện | Điền "Số Zalo" trong Trang chủ → Thông tin liên hệ |

---

## CẤU TRÚC FILE THEME (để custom nâng cao)

```
thokhoa247/
├── style.css                    # CSS chính toàn site
├── functions.php                # Đăng ký CPT, menu, hooks
├── header.php                   # Header + menu
├── footer.php                   # Footer
├── front-page.php               # Trang chủ
├── single.php                   # Bài viết đơn
├── single-san-pham.php          # Trang sản phẩm
├── archive-san-pham.php         # Danh sách sản phẩm
├── inc/
│   ├── admin-options.php        # Trang admin "Trang chủ"
│   ├── default-content.php      # Dữ liệu mặc định
│   └── acf-fields.php           # Khai báo ACF fields
├── template-parts/
│   ├── hero.php                 # Banner slider
│   ├── cta-bar.php              # Dải hotline
│   ├── services-featured.php    # 3 dịch vụ nổi bật
│   ├── services-grid.php        # Lưới 9 dịch vụ nền đỏ
│   ├── about.php                # Giới thiệu
│   ├── areas.php                # Khu vực phục vụ
│   ├── products-featured.php    # Sản phẩm nổi bật
│   ├── blog-news.php            # Blog
│   ├── testimonials.php         # Đánh giá khách hàng
│   └── gallery.php              # Gallery ảnh
├── assets/
│   ├── css/style.css            # CSS bổ sung
│   └── js/main.js               # JS (slider, menu mobile...)
└── demo-content.xml             # File import dữ liệu mẫu
```
