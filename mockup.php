<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <table>
        <tr>
            <td>
                Master Gedung
            </td>
            <td>
                <select name="gedung" id="gedung">
                    <option value="">--Pilih Master gedung--</option>
                    <option value="gedung1">gedung1</option>
                    <option value="gedung2">gedung2</option>

                </select>
            </td>
        </tr>
        <tr>
            <td>
                Master Ruangan
            </td>
            <td>
                <select name="ruangan_blkg" id="ruangan_blkg" style="display:none">
                    <option value="">--Pilih Master dpn--</option>
                    <option value="poli">poli</option>
                    <option value="ifrs">ifrs</option>
                    <option value="vk">vk</option>

                </select>
                <select name="ruangan_dpn" id="ruangan_dpn" style="display:none">
                    <option value="">--Pilih Master blkg--</option>
                    <option value="igd">igd</option>
                    <option value="bidangumum">bidangumum</option>
                    <option value="gizi">gizi</option>
                </select>
            </td>
        </tr>
    </table>

    <script>
        $('#gedung').on("change", function () {
        var jangka_waktu = $('#gedung').val();
            if(jangka_waktu == 'gedung1'){
              $("#ruangan_dpn").removeAttr("style");
              $("#ruangan_blkg").attr("style", "display: none;");
              $('#ruangan_blkg').val('');
            }else if(jangka_waktu == 'gedung2'){
            $("#ruangan_blkg").removeAttr("style");
              $("#ruangan_dpn").attr("style", "display: none;");
              $('#ruangan_dpn').val('');
            }else{
              $("#ruangan_blkg").attr("style", "display: none;");
              $("#ruangan_dpn").attr("style", "display: none;");
              $('#ruangan_blkg').val('');
              $('#ruangan_dpn').val('');

            }
      })
    </script>
</body>
</html>