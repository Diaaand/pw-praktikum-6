<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,700&display=swap');

        .centerfont {
            font-size: 35px;
            text-align: center;
            font-family: 'Josefin Sans', sans-serif;
        }

        .centerfont2 {
            font-size: 75px;
            text-align: center;
            font-family: 'Josefin Sans', sans-serif;
        }

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&display=swap');

        .centerfont3 {
            font-size: 35px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            font-family: 'Barlow Condensed', sans-serif;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        table {
            font-size: 30px;
            border-collapse: collapse;
            margin: auto;
            font-family: 'Barlow Condensed', sans-serif;
        }

        .th,
        td {
            padding: 15px;
            border: 1px solid;
            text-align: center;
            font-family: 'Barlow Condensed', sans-serif;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Praktikum 6</title>
</head>

<body style="background-color:LightCyan;">

    <h1 class="centerfont2" style="background-color:LightSteelBlue;">PT. Once Sejahtera</h1>
    <img src="building_kaisya.png" class="center" alt="Company Building" width="90" height="1010">
    <br><br>
    <p class="centerfont" style="background-color:LightSteelBlue;">Berikut adalah kategori biaya listrik : </p>
    <table class="table table-striped">
        <tr>
            <th>Kategori</th>
            <th>Abodemen</th>
            <th>Tarif per-KWH</th>
            <th>Pajak</th>
        </tr>

        <tbody id="myTable">

        </tbody>
    </table>

    <script>
        var myArray = [{
                'kategori': 'Sosial',
                'abodemen': 10000,
                'tarif': 300,
                'pajak': 0.
            },
            {
                'kategori': 'Rumah',
                'abodemen': 30000,
                'tarif': 500,
                'pajak': 0.1
            },
            {
                'kategori': 'Apartemen',
                'abodemen': 50000,
                'tarif': 750,
                'pajak': 0.15
            },
            {
                'kategori': 'Industri',
                'abodemen': 75000,
                'tarif': 1000,
                'pajak': 0.20
            },
            {
                'kategori': 'Villa',
                'abodemen': 100000,
                'tarif': 1250,
                'pajak': 0.25
            },
        ]

        buildTable(myArray)


        function buildTable(data) {
            var table = document.getElementById('myTable')

            for (var i = 0; i < data.length; i++) {
                var row = `<tr>
							<td>${data[i].kategori}</td>
							<td>${data[i].abodemen}</td>
							<td>${data[i].tarif}</td>
                            <td>${data[i].pajak}</td>
					  </tr>`
                table.innerHTML += row


            }
        }
    </script>

    <br><br>
    <h2 class="centerfont" style="background-color:LightSteelBlue;">Tagihan Listrik</h2>
    <table class="table table-striped">
        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" id="namaP" value="Your name here..."></td>
        </tr>
        <tr>
            <td>kategori</td>
            <td>
                <form><select id="myKategori" class="centerfont3">
                        <option value="Sosial">Sosial</option>
                        <option value="Rumah">Rumah</option>
                        <option value="Apartemen">Apartemen</option>
                        <option value="Industri">Industri</option>
                        <option value="Villa">Villa</option>
                    </select>
                </form>
            </td>
        </tr>
        <tr>
            <td>Jumlah Pemakaian</td>
            <td><input type="number" id="jmlh" value="0"></td>
        </tr>
    </table>
    <button onclick="hitungFunction()" class="centerfont3">Submit</button>

    <h2 class="centerfont" style="background-color:LightSteelBlue;">Rincian Tagihan</h2>
    <div id="rincian"></div>

    <script>
        const list = {
            "Sosial": {
                "abodemen": 10000,
                "tarif": 300,
                "pajak": 0
            },

            "Rumah": {
                "abodemen": 30000,
                "tarif": 500,
                "pajak": 0.1
            },

            "Apartemen": {
                "abodemen": 50000,
                "tarif": 750,
                "pajak": 0.15
            },

            "Industri": {
                "abodemen": 75000,
                "tarif": 1000,
                "pajak": 0.2
            },

            "Villa": {
                "abodemen": 100000,
                "tarif": 1250,
                "pajak": 0.25
            }
        };

        function hitungFunction() {
            var name = document.getElementById("namaP").value;
            var kat = document.getElementById("myKategori");
            var jumlahP = document.getElementById("jmlh");
            var rincian = document.getElementById("rincian");

            if (name == ' ') {
                alert("Nama Harus diisi!");
            } else if (jumlahP.value > 30) {
                alert("Jumlah Hari tidak Valid!");
            } else {
                var table = document.createElement('table');
                table.setAttribute('class', 'tabelRinci');
                table.innerHTML = `
        <thead>
            <tr>
                <th>Jumlah</th>
                <th>Tarif Per KWH</th>
                <th>Abodemen</th>
                <th>SubTotal</th>
            </tr>
        </thead>
        `;

                table.innerHTML += `<tbody>`;
                for (let i = 0; i <= jumlahP.value; i++) {
                    rinciT = list[`${kat.value}`]['tarif'] * i;
                    aboT = list[`${kat.value}`]['abodemen'];
                    table.innerHTML += `
            <tr>
                <td>${i}</td>
                <td>${rinciT}</td>
                <td>${aboT}</td>
                <td>${rinciT + aboT}</td>
            </tr>
            `
                }
                table.innerHTML += `</tbody>`;

                subtot = list[`${kat.value}`][`tarif`] * jumlahP.value;
                detail = {
                    "SubTotal": subtot,
                    "Pajak": subtot * 0.1,
                    "Bayar": subtot * 1.1
                };

                for (let item in detail) {
                    table.innerHTML += `
            <tfoot>
                <tr>
                    <td>${item}</td>
                    <td></td>
                    <td></td>
                    <td>${detail[item]}</td>
                </tr>
            </tfoot>
            `;
                }

                rincian.appendChild(table);
            }
        }
    </script>

</body>

</html>