let gap = 0;

function gantiPekan(data) {
     $('.rekap-body').empty();
     let td = '';
     let kelas = '';
     let isi = '';
     let total = 0;
     $.each(data, function (i, value) {
          for (j = 0; j < 7; j++) {
               if (j > 0 && j < 6) {
                    total = total + data[i][j];
                    kelas = 'text-center harian';
               } else if (j == 7) {
                    kelas = 'text-center';
               } else {
                    kelas = '';
               }

               if (data[i][j] == 0) {
                    isi = '';
               } else if (j == 6) {
                    isi = total;
               } else {
                    isi = data[i][j];
               }

               if (j == 6 && total > 1) {
                    kelas += 'text-center text-bold';
               } else if (j == 6 && total < 2) {
                    kelas += 'text-center text-bold';
               }
               td += '<td class="border ' + kelas + '">' + isi + '</td>';
          }
          $('table.table').append(
               `<tr>
    ` +
                    td +
                    `
    </tr>`
          );
          td = '';
          total = 0;
     });
}

let link = '';

function mingguApaa(gap) {
     var mingguApa = dates(new Date(datess.setDate(datess.getDate() + gap)));
     var mingguIni = dates(new Date());
     $('.minggu-apa').html(ubahFormatTanggal(mingguApa[0].toISOString().slice(0, 10)) + ' - ' + ubahFormatTanggal(mingguApa[0].toISOString().slice(0, 10)));
     link =
          '/' +
          mingguApa[0].toISOString().slice(0, 10) +
          '&' +
          mingguApa[1].toISOString().slice(0, 10) +
          '&' +
          mingguApa[2].toISOString().slice(0, 10) +
          '&' +
          mingguApa[3].toISOString().slice(0, 10) +
          '&' +
          mingguApa[4].toISOString().slice(0, 10);
     render(link);
     if (mingguApa[0].toISOString().slice(0, 10) == '2022-08-01') {
          $('.sebelum').attr('disabled', true);
     } else if (mingguApa[0].toISOString().slice(0, 10) > '2022-08-01' && mingguApa[0].toISOString().slice(0, 10) < mingguIni[0].toISOString().slice(0, 10)) {
          $('.sebelum').attr('disabled', false);
          $('.hari-ini').attr('disabled', false);
     } else if (mingguApa[0].toISOString().slice(0, 10) == mingguIni[0].toISOString().slice(0, 10)) {
          $('.hari-ini').attr('disabled', true);
          $('.minggu-apa').html('Minggu Ini');
     }
}

function dates(current) {
     var week = new Array();
     // Starting Monday not Sunday
     current.setDate(current.getDate() - current.getDay() + 1);
     for (var i = 0; i < 5; i++) {
          week.push(new Date(current));
          current.setDate(current.getDate() + 1);
     }
     return week;
}
const datess = new Date();

var minggu = dates(new Date(datess.setDate(datess.getDate())));
link = '/' + minggu[0].toISOString().slice(0, 10) + '&' + minggu[1].toISOString().slice(0, 10) + '&' + minggu[2].toISOString().slice(0, 10) + '&' + minggu[3].toISOString().slice(0, 10) + '&' + minggu[4].toISOString().slice(0, 10);
render(link);
jadwal();

function jadwal() {
     $.getJSON(jadwalLink, function (jd) {
          $.each($('.rekap-body tr'), function (index, value) {
               $.each($(this).find('.harian'), function (indexx, value) {
                    if (indexx < 5 && indexx >= 0) {
                         if ($(this).text() != '') {
                              $(this).addClass('tercapai');
                         }
                    }

                    if (jd[index][indexx + 1] == true && $(this).text() == '') {
                         $(this).addClass('tidak-tercapai');
                    } else if (jd[index][indexx + 1] == true && $(this).text() != '') {
                    }
               });
          });
     });
}
