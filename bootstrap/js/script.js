
$(document).ready(function(){
    
    $('.updateabsensi input').on('change', function(){

        
        document.cookie="status=Hadir";
        
        var status = "Hadir";

        var currow = $(this).closest('tr');
        var kode = currow.find('td:eq(1)').text();
        var absen = "Hadir";

        console.log("OKE");
        
    });
    
    $('.updateabsensi2 input').on('change', function(){

        document.cookie="status= Tidak Hadir";

        var status = "Tidak Hadir";

        var currow = $(this).closest('tr');
        var kode = currow.find('td:eq(1)').text();
        var absen = "Tidak Hadir";

        console.log("OKE");

    });

});
