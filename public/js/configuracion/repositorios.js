$(function() {
	// Chebox style
	$('.minimal').iCheck({
		checkboxClass : 'icheckbox_minimal-blue',
		radioClass : 'iradio_minimal-blue'
	});

	// Popover
	$('[data-toggle="popover"]').popover({
		html : true
	}).click(function(e) {
		e.preventDefault();
	});

	// Initialize Select2 Elements
	$('.select2').select2();

	// Datemask dd/mm/yyyy
	$('[data-mask]').inputmask();
	
	// Initialize fileinput Elements.
	$(".bootstrap-file-upload").fileinput({
		allowedFileExtensions : [ 'csv', 'xls', 'xlsx'],
		allowedPreviewTypes: null,
		previewFileIconSettings : {
			'jpg' : '<i class="fa fa-file-photo-o text-warning"></i>',
	        'pdf' : '<i class="fa fa-file-pdf-o text-danger"></i>',
	        'doc' : '<i class="fa fa-file-word-o text-primary"></i>',
			'xls' : '<i class="fa fa-file-excel-o text-success"></i>',
			'ppt' : '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'zip' : '<i class="fa fa-file-archive-o text-warning"></i>'
		},
		previewFileExtSettings : {
			'jpg' : function(ext) {
				return ext.match(/(jpg|jpeg|gif|png)$/i)
			},
			'doc' : function(ext) {
				return ext.match(/(doc|docx)$/i)
			},
			'xls' : function(ext) {
				return ext.match(/(xls|xlsx|csv)$/i)
			},
			'ppt' : function(ext) {
				return ext.match(/(ppt|pptx)$/i)
			},
			'zip' : function(ext) {
				return ext.match(/(zip|rar|7z)$/i)
			}
		},
		showPreview: false
	});

	// Validate input file Selecction
	$('form').on('submit', function(e) {
		if ($('.file-caption-name span.text-danger').length) {
			e.preventDefault();
			$('#modal-error').modal('show');
		}
	});
});