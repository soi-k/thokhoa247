jQuery(function ($) {
	// Media uploader cho từng nút "Chọn ảnh"
	$(document).on('click', '.tk247-upload-btn', function (e) {
		e.preventDefault();
		var $btn = $(this);
		var $input = $btn.prev('.tk247-image-url');

		var frame = wp.media({
			title: 'Chọn ảnh',
			button: { text: 'Dùng ảnh này' },
			multiple: false,
		});

		frame.on('select', function () {
			var attachment = frame.state().get('selection').first().toJSON();
			$input.val(attachment.url);
			// Hiển thị preview
			var $preview = $btn.next('img');
			if ($preview.length) {
				$preview.attr('src', attachment.url);
			} else {
				$btn.after('<br><img src="' + attachment.url + '" style="max-height:80px;margin-top:8px;border-radius:4px">');
			}
		});

		frame.open();
	});

	// Thêm banner mới
	$('#add-slide').on('click', function () {
		var count = $('.slide-row').length;
		if (count >= 4) {
			alert('Tối đa 4 banner');
			return;
		}
		var html = '<div class="slide-row" style="border:1px solid #ddd;padding:16px;margin-bottom:16px;background:#f9f9f9;border-radius:4px">'
			+ '<strong>Banner ' + (count + 1) + '</strong>'
			+ '<table class="form-table" style="margin-top:8px">'
			+ '<tr><th width="160">Tiêu đề</th><td><input type="text" name="slide_title[]" class="regular-text" placeholder="VD: DỊCH VỤ SỬA KHÓA TẠI NHÀ"></td></tr>'
			+ '<tr><th>Phụ đề</th><td><input type="text" name="slide_subtitle[]" class="large-text" placeholder="VD: Chuyên nghiệp - Nhanh - 24/7"></td></tr>'
			+ '<tr><th>Ảnh banner</th><td><input type="text" name="slide_image[]" class="large-text tk247-image-url" placeholder="URL ảnh"><button type="button" class="button tk247-upload-btn">Chọn ảnh</button></td></tr>'
			+ '<tr><th>Link (khi bấm)</th><td><input type="text" name="slide_link[]" class="regular-text" placeholder="https://..."></td></tr>'
			+ '</table></div>';
		$('#slides-wrap').append(html);
	});
});
