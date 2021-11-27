@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Kategoriler Yönetimi</h1>

    <form method="post"
          action="{{ route("yonetim.kategori.kaydet",@$kategori->id) }}">
          @csrf
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$kategori->id > 0 ? 'GÜNCELLE' : 'KAYDET'}}
            </button>
        </div>
        <h2 class="sub-header">
            Kategori {{ @$kategori->id > 0 ? 'DÜZENLE' : 'EKLE'}}
        </h2>

        @include("layouts.messages.validation_errors")
        @include("layouts.messages.session_alerts")

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="kategori_ad">
                        ÜST KATEGORİ
                    </label>
                    <select class="form-control" name="" id="">
                        <option value="">
                            ANA KATEGORİ
                        </option>
                        @foreach($ust_kategoriler as $ust_kategori)
                        <option value="{{ $ust_kategori->id }}" {{ ($ust_kategori->id == $kategori->id) ? 'selected' : null }}>
                            {{ $ust_kategori->kategori_ad }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kategori_ad">
                        KATEGORİ ADI
                    </label>
                    <input name="kategori_ad"
                           type="text"
                           value="{{ old("kategori_ad", @$kategori->kategori_ad) }}"
                           class="form-control"
                           id="kategori_ad"
                           placeholder="KATEGORİ ADI">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="slug">
                        SLUG
                    </label>
                    <input name="original_slug"
                           type="hidden"
                           value="{{ old("slug",@$kategori->slug) }}">
                    <input name="slug"
                           type="text"
                           class="form-control"
                           id="slug"
                           value="{{ old("slug",@$kategori->slug) }}"
                           placeholder="SLUG">
                </div>
            </div>
        </div>
    </form>

@endsection