<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Halaman Cek Ongkir</h2>
        <div class="w-50">
            <form action="" method="POST">
                @csrf
                <div class="mt-3">
                    <label for="origin">Asal Kota</label>
                    <select name="origin" id="origin" class="form-control" required>
                        <option value="">Pilih Kota asal</option>
                        @foreach ($cities as $city)
                        <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="destination">Kota Tujuan</label>
                    <select name="destination" id="destination" class="form-control" required>
                        <option value="">Pilih Kota Tujuan</option>
                        @foreach ($cities as $city)
                        <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="weight">Berat Paket</label>
                    <input type="number" name="weight" id="weight" class="form-control" required>
                </div>
                <div class="mt-3">
                    <label for="courier">Pilih Kurir</label>
                    <select name="courier" id="courier" class="form-control" required>
                        <option value="">Pilih Kurir</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                    </select>
                </div>
                <div class="mt-3">
                    <input type="submit" name="cekOngkir" class="btn btn-primary w-100">
                </div>
            </form>
            <div class="mt-5">
                @if ($ongkir != '')
                <h3>Rincian Ongkir</h3>
                @foreach ($ongkir as $item)
                <div>
                    <label for="name">Nama : {{$item['name']}}</label>
                    @foreach ($item['costs'] as $costs)
                    <div class="mb-3">
                        <label for="service">Service : {{$costs['service']}}</label>
                        @foreach ($costs['cost'] as $cost)
                        <div>
                            <label for="harga">Harga : {{$cost['value']}}</label>
                        </div>
                        <div>
                            <label for="harga">Estimasi : {{$cost['etd']}}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>

</html>