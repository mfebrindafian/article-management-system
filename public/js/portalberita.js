$(document).on('click', '#btnSemua', function () {
     $(this).addClass('berita-active shadow').removeClass('filter-berita');
     $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita');
     $('#rowSemua').removeClass('d-none');
     $('#rowReady').addClass('d-none');
     $('#rowReviewing').addClass('d-none');
     $('#rowPublished').addClass('d-none');
     $('.cari-semua').removeClass('d-none');
     $('.cari-ready').addClass('d-none');
     $('.cari-review').addClass('d-none');
     $('.cari-publish').addClass('d-none');
});
$(document).on('click', '#btnReady', function () {
     $(this).addClass('berita-active shadow').removeClass('filter-berita');
     $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita');
     $('#rowSemua').addClass('d-none');
     $('#rowReady').removeClass('d-none');
     $('#rowReviewing').addClass('d-none');
     $('#rowPublished').addClass('d-none');
     $('.cari-semua').addClass('d-none');
     $('.cari-ready').removeClass('d-none');
     $('.cari-review').addClass('d-none');
     $('.cari-publish').addClass('d-none');
});

$(document).on('click', '#btnReviewing', function () {
     $(this).addClass('berita-active shadow').removeClass('filter-berita');
     $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita');
     $('#rowSemua').addClass('d-none');
     $('#rowReady').addClass('d-none');
     $('#rowReviewing').removeClass('d-none');
     $('#rowPublished').addClass('d-none');
     $('.cari-semua').addClass('d-none');
     $('.cari-ready').addClass('d-none');
     $('.cari-review').removeClass('d-none');
     $('.cari-publish').addClass('d-none');
});
$(document).on('click', '#btnPublished', function () {
     $(this).addClass('berita-active shadow').removeClass('filter-berita');
     $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita');
     $('#rowSemua').addClass('d-none');
     $('#rowReady').addClass('d-none');
     $('#rowReviewing').addClass('d-none');
     $('#rowPublished').removeClass('d-none');
     $('.cari-semua').addClass('d-none');
     $('.cari-ready').addClass('d-none');
     $('.cari-review').addClass('d-none');
     $('.cari-publish').removeClass('d-none');
});

if ($('.isi-semua').children().length == 0) {
     $('.isi-semua').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
}
if ($('.isi-ready').children().length == 0) {
     $('.isi-ready').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
}
if ($('.isi-review').children().length == 0) {
     $('.isi-review').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
}
if ($('.isi-publish').children().length == 0) {
     $('.isi-publish').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
}
