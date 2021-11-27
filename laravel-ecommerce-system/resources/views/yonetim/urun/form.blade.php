@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Ürünler Yönetimi</h1>

    <form method="post" enctype="multipart/form-data"
          action="{{ route("yonetim.urun.kaydet",@$urun->id) }}">
          @csrf
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$urun->id > 0 ? 'GÜNCELLE' : 'KAYDET'}}
            </button>
        </div>
        <h2 class="sub-header">
            ÜRÜN {{ @$urun->id > 0 ? 'DÜZENLE' : 'EKLE'}}
        </h2>

        @include("layouts.messages.validation_errors")
        @include("layouts.messages.session_alerts")

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="urun_ad">
                        ÜRÜN ADI
                    </label>
                    <input name="urun_ad"
                           type="text"
                           value="{{ old("urun_ad", @$urun->urun_ad) }}"
                           class="form-control"
                           id="urun_ad"
                           placeholder="ÜRÜN ADI">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">
                        SLUG
                    </label>
                    <input name="original_slug"
                           type="hidden"
                           value="{{ old("slug",@$urun->slug) }}">
                    <input name="slug"
                           type="text"
                           class="form-control"
                           id="slug"
                           value="{{ old("slug",@$urun->slug) }}"
                           placeholder="SLUG">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fiyat">
                        ÜRÜN FİYATI
                    </label>
                    <input name="fiyat"
                           type="text"
                           value="{{ old("urun_ad", @$urun->fiyat) }}"
                           class="form-control"
                           id="fiyat"
                           placeholder="ÜRÜN FİYATI">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kategoriler">
                        ÜRÜN KATEGORİSİ
                    </label>
                    <select name="kategoriler[]" id="kategoriler" multiple class="form-control">
                        @foreach($kategoriler as $kategori)
                        <option value="{{ $kategori->id }}"
                                {{ collect(old("kategoriler",$urun_kategorileri))->contains($kategori->id) ? "selected" : null }}>
                            {{ $kategori->kategori_ad }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aciklama">
                        AÇIKLAMA
                    </label>
                    <textarea class="form-control" name="aciklama" id="aciklama">{{ $urun->aciklama }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkbox">
                    <label>
                        <input type="hidden" name="goster_slider" value="0">
                        <input name="goster_slider"
                               type="checkbox"
                               {{ old("goster_slider",@$urun->detay->goster_slider) ? 'checked' : null }}
                               value="1"> Slider Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_gunun_firsati" value="0">
                        <input name="goster_gunun_firsati"
                               type="checkbox"
                               {{ old("goster_gunun_firsati",@$urun->detay->goster_gunun_firsati) ? 'checked' : null }}
                               value="1"> Günün Fırsatı Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_one_cikan" value="0">
                        <input name="goster_one_cikan"
                               type="checkbox"
                               {{ old("goster_one_cikan",@$urun->detay->goster_one_cikan) ? 'checked' : null }}
                               value="1"> Öne Çıkan Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_cok_satan" value="0">
                        <input name="goster_cok_satan"
                               type="checkbox"
                               {{ old("goster_cok_satan",@$urun->detay->goster_cok_satan) ? 'checked' : null }}
                               value="1"> Çok Satanlar Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_indirimli" value="0">
                        <input name="goster_indirimli"
                               type="checkbox"
                               {{ old("goster_indirimli",@$urun->detay->goster_indirimli) ? 'checked' : null }}
                               value="1"> İndirimli Alanında Göster
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                @if($urun->detay->urun_resmi != null)
                    <img src="/uploads/urunler/{{ $urun->detay->urun_resmi }}"
                         style="height:100px;"
                         class="thumbnail pull-left" >
                @endif
                <label for="urun_resmi">Ürün Resmi</label>
                <input type="file" id="urun_resmi" name="urun_resmi" class="form-control">
            </div>
        </div>
    </form>
@endsection
@section("admin_scripts")
    <script src="/js/select2.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/my_plugins/autogrow.min.js"></script>
    <script>
        $(function(){
            $("#kategoriler").select2({
                placeholder:"KATEGORİ SEÇİNİZ"
            });
            var options = {
                uiColor : "#f4645f",
                language : "tr",
                extraPlugins : "autogrow",
                autoGrow_minHeight : 250,
                autoGrow_maxHeight : 600,
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            }
            CKEDITOR.replace("aciklama",options);
        });
    </script>
@endsection
@section("admin_styles")
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection