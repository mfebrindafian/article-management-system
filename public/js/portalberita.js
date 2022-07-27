$(document).on('click', '#btnSemua', function () {
     $(this).addClass('berita-active shadow').removeClass('filter-berita');
     $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita');
     $('#rowSemua').removeClass('d-none');
     if ($('#rowSemua').children().length == 0) {
          $('#rowSemua').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
     }
     $('#rowReady').addClass('d-none');
     $('#rowReviewing').addClass('d-none');
     $('#rowPublished').addClass('d-none');
});
$(document).on('click', '#btnReady', function () {
     $(this).addClass('berita-active shadow').removeClass('filter-berita');
     $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita');
     $('#rowSemua').addClass('d-none');
     $('#rowReady').removeClass('d-none');
     if ($('#rowReady').children().length == 0) {
          $('#rowReady').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
     }
     $('#rowReviewing').addClass('d-none');
     $('#rowPublished').addClass('d-none');
});
$(document).on('click', '#btnReviewing', function () {
     $(this).addClass('berita-active shadow').removeClass('filter-berita');
     $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita');
     $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita');
     $('#rowSemua').addClass('d-none');
     $('#rowReady').addClass('d-none');
     $('#rowReviewing').removeClass('d-none');
     if ($('#rowReviewing').children().length == 0) {
          $('#rowReviewing').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
     }
     $('#rowPublished').addClass('d-none');
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
     if ($('#rowPublished').children().length == 0) {
          $('#rowPublished').append(`<span class="w-100 d-flex flex-column justify-content-center align-items-center"><img style="max-width: 160px;" src="` + link + `" alt=""><em>Data kosong</em></span>`);
     }
});
