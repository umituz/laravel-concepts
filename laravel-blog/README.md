# Laravel Blog

Özellikler:

* 📝 Makaleler için basit CRUD (create, read, update, delete) işlemler,
* 👥 Rol bazlı kullanıcı sistemi (admin, moderator, yazar, okuyucu),
* ⭐ Makale oylama sistemi,
* ⏲️ Makale paylaşımını ileri bir tarih için planlama,
* ↔️ Yazılar arasında kolay geçiş,
* 🌐 Cache sistemi,
* 🔑 OAUTH 2.0 destekli RESTfull API,

Kullanılan teknolojiler/araçlar:

* [Laravel 8](https://laravel.com/)
    * [Laravel/Passport](https://laravel.com/docs/8.x/passport): OAUTH 2.0 için,
    * [Laravel/Dusk](https://laravel.com/docs/8.x/dusk): Browser tabanlı testler için,
    * [Laravel/helpers](https://laravel.com/docs/8.x/helpers): Laravel'e bağlı yardımcı fonksiyonlar için
    * [Laravel/ui](https://laravel.com/docs/8.x/ui): Laravel auth yapısı için ve frontend kısımları için
* [whtht/perfectly-cache](https://github.com/whthT/perfectly-cache): Sorgu sonuçlarını cache'lemek için,
* [phpunit/phpunit](https://phpunit.de/): Birim testler için,
* [cyrildewit/eloquent-viewable](https://github.com/cyrildewit/eloquent-viewable): Sayfa ziyaretçilerini tespit etmek için 
* [cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable): Sütuna bağlı slug yapısı oluşturmak için 
* [spatie/laravel-permission](https://github.com/spatie/laravel-permission): Yetkilendirme sistemi için
* [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar): Sayfa ile ilgili debug yapısı

## Kullanımı

### 0. Gereksinimler

* PHP 7.3 veya üzeri
* MySQL
* Composer
* NodeJS / npm

#### 1 Gerekli kütüphanelerin kurulumu

PHP ve JavaScript kütüphanelerinin kurulması için:

```console
$ composer install
$ npm install
```

### 2. Konfigürasyonlar

Ortam değişkenlerini ayarlamak için `.env.example` dosyasını `.env` olarak yeniden isimlendirin ve `DB_` ile başlayan
değişkenleri düzenleyin.

```console
$ cp .env.example .env
```

Aşağıdaki komutla uygulama anahtarını yeniden ürettirin.

```console
$ php artisan key:generate
```

Gerekli veritabanı tablolarının oluşturulması için:

```console
$ php artisan migrate
```

OAUTH 2.0 destekli API'nin çalışabilmesi için:

```console
$ php artisan passport:install
```

### 3. Uygulamayı çalıştırmak

Uygulamayı çalıştırmak için aşağıdaki komutla basit bir web sunucusu oluşturabilirsiniz:

```console
$ php artisan serve
```

uygulama şu an **localhost:8000** adresinde çalışıyor.

Varsayılan kullanıcıları veritabanına eklemek ve rastgele makaleler oluşturmak için:

```console
$ php artisan db:seed
```

İleri tarih için zamanlanmış makalelerin yayınlanabilmesi için arkada sürekli açık olması gereken komut:

```console
$ php artisan schedule:work
```

## Test

Birim testleri çalıştırmak için:

```console
$ ./vendor/bin/phpunit
```

Tarayıcı üzerinde çalışan testleri çalıştırmak için öncelikle bir terminal'de uygulamayı ayağa kaldırın:

```console
$ php artisan serve
```

daha sonra gerekli driver'ları kurmak ve testleri çalıştırmak için (bu testler `.env` dosyasında belirttiğiniz
veritabanını kullanır ve bu testlerin çalışması uzun sürebilir):

```console
$ php artisan dusk:chrome-driver
$ php artisan dusk
```

**NOT:** Bu komutun çalışabilmesi için bilgisayarınızda Google Chrome tarayıcısının yüklü olması gerekir. Olası bir
sorunda
`vendor/laravel/dusk/bin/` dizini altındaki dosyaların 755 izinlerinin olduğundan emin olun:

```console
$ chmod 755 -R ./vendor/laravel/dusk/bin/
```

## RESTfull API Kaynakları

### [POST] `/api/login/`

`email` ve `password` kabul eder. Bilgiler doğrusa, kullanıcya özel OAUTH 2.0 anahtlarını JSON formatında geri döner.

**Örnek kullanım (varsayılan kullanıcıların `seed` edilmiş olması gerekir):**

```console
$ curl --request POST \
  --url http://localhost:8000/api/login \
  --header 'Content-Type: application/json' \
  --data '{"email": "admin@mobillium.com", "password": "mobillium"}'
```

Cevap:

```json
{
    "token_type": "Bearer",
    "expires_at": "2nd May 2022 18:11:21",
    "user_id": 1,
    "email": "admin@mobillium.com",
    "name": "Mobillium Admin",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMDdiYTkxNWE0MDc2MmQ5YTJjOWY0N2ZlYzAwYWFmOGRhOTg2YjgzOTBmZGUwYWY1NWQ1N2JiZGRmYmRjMTI5OTBjM2I3MDMyMTk4ZGY4ZTgiLCJpYXQiOjE2MTk5NjgyODEuODc1OTUxLCJuYmYiOjE2MTk5NjgyODEuODc1OTU3LCJleHAiOjE2NTE1MDQyODEuODMyNDk4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.A2hWoDAb4J_rP5UNxebP-v0BnfumaOtRtqJT8O2p9T832QIa3HU7V28pAttQ9z8GTcKsdHn3AJ98JK4gQeDMULVhraUkpwzP4nOI9atFarO9IBlbeb0X-SmzoD3ASPEfKGjm9gnYYXCyOdo4MEZ7jurGaufsQyuGuDWig40sPsNvEluR8vfr6wzvmPDBDKqPXlIQr_7jBsNu2VuaGNs95ZUgMVzVq8igGrLYxPDvSVMojleWrwqJcVQw5fyvyTNEv904zO7t2g4aBH4RyBYB9tGVQ1dyPXE6l7LeXi6oYF9Bvc6RG0yNYdwgRXHFfdlTXWwLiKJDaz01lHEkGB3njNLr6Xfe0EuYVi55sCaf592nIp0bqLsoBz0C2bZ-Hy-oJGZa2af0Zoncaoi3OH819l7Lpg4R9EVPtB0Z5mLCV4x4UFTF33-nW8WGmNfEH9UvAeRnxInGph77VnqQDACmpGV5JxNYsSMeA5M-eCLlMjLGJtVwx3fo1dofQOlGQIY3tKKP77JfidY0zjwrPOi7X5q2bNzhcLyrXx-mLDnyAojhWJqMSZ9zdHQvkQ1C7VwoopdM3AX-5yxnoge9AcRS5bJvQKujb584cGfrryu0ccHoTQyKnvJQCi02NNHYLr8SsyOHPoIA4TADkM2rnnG09O2vyR3LJC7OR2WyS5hDGcQ"
}
```

```console
$ curl --request POST \
  --url http://localhost:8000/api/register \
  --header 'Content-Type: application/json' \
  --data '{"name":"Mobillium Writer", "email": "writer1@mobillium.com", "password": "mobillium"}'
```

Cevap:

```json
{
    "user_id": 2,
    "name": "Mobillium Writer",
    "email": "writer1@mobillium.com",
    "roles": [
        "Reader"
    ]
}
```

`access_token` kısmı sonraki istekler için gerekli olacak.

### [GET] `/api/posts`

Tüm kullanıcılara ait tüm makeleleri JSON formatında geri döner. Bu API kaynağını kullanabilmek için "admin" rolüne
sahip olmak gerekir.

**Örnek kullanım:**

```console
$ curl --request GET \
  --url http://localhost:8000/api/posts/ \
  --header 'Authorization: Bearer [BURAYA ACCESS_TOKEN GELECEK]'
```

Cevap

```json
{
    "total": 12,
    "data": [
        {
            "post_id": 12,
            "user_id": 1,
            "author": "Mobillium Admin",
            "title": "test title",
            "slug": "test-title",
            "content": "test content",
            "status": "PUBLISHED",
            "published_at": "2nd May 2021 18:48:10"
        },
        ...
    ]
}
```

### [GET] `/api/posts/export`

Oturum açan kullanıcıya ait tüm makeleleri JSON formatında geri döner.

**Örnek kullanım:**

```console
$ curl --request GET \
  --url http://localhost:8000/api/posts/export \
  --header 'Authorization: Bearer [BURAYA ACCESS_TOKEN GELECEK]'
```
Cevap

```json
{
    "total": 27,
    "data": [
        {
            "post_id": 27,
            "user_id": 1,
            "author": "Mobillium Admin",
            "title": "32444",
            "slug": "32444",
            "content": "332",
            "status": "PUBLISHED",
            "published_at": "3rd May 2021 2:26:56"
        },
        ...
    ]
}
```

### [POST] `/api/posts/`

Yeni makale oluşturur. Oluşturulan makaleyi JSON formatında geri döner.

* Gerekli alanlar: `title`, `content`
* Opsiyonel alanlar: `published_at`: Tarih saat formatı: `Y-m-d H:i`Sadece ileri zamanlı makale planlamak için gerekli,
  varsayılan olarak o anki tarih-saati kullanır.

**Örnek kullanım:**

```console
$ curl --request POST \
  --url http://localhost:8000/api/posts \
  --header 'Authorization: Bearer [BURAYA ACCESS_TOKEN GELECEK]' \
  --header 'Content-Type: application/json' \
  --data '{"title": "Test title", "content": "test content"}'
```

Cevap:

```json
{
    "post_id": 18,
    "user_id": 1,
    "author": "Mobillium Admin",
    "title": "test title",
    "slug": "test-title-7",
    "content": "test title",
    "status": "DRAFT",
    "published_at": "2nd May 2021 19:16:00"
}
```

### [PUT] `/api/posts/{id}`

`id`si verilen makalenin içeriğini günceller. Güncellenen makale içeriği geriye JSON olarak gönderilir.

* Gerekli alanlar: `title`, `content`

**Örnek Kullanım:**

```console
$ curl --request POST \
  --url http://localhost:8000/api/posts/1 \
  --header 'Authorization: Bearer [BURAYA ACCESS_TOKEN GELECEK]' \
  --data '{"title": "title update", "content": "content update"}'
```

Cevap:

```json
{
    "post_id": 2,
    "user_id": 14,
    "author": "Noelia Runolfsdottir PhD",
    "title": "title update",
    "slug": "title-update",
    "content": "content update",
    "status": "PUBLISHED",
    "published_at": "2nd May 2021 18:35:19"
} 
```

### [PUT] `/api/posts/{id}/publish`

`id`si verilen makaleyi yayına alır. Yayına alınan makalenin içeriği geriye JSON olarak gönderilir. `id`si verilen
makalenin yayınlanmamış olması gerekir.

**Örnek Kullanım:**

```console
$ curl --request PUT \
  --url http://localhost:8000/api/posts/2/publish \
  --header 'Authorization: Bearer [BURAYA ACCESS_TOKEN GELECEK]'
```

Cevap:

```json
{
    "post_id": 2,
    "user_id": 14,
    "author": "Noelia Runolfsdottir PhD",
    "title": "title update",
    "slug": "title-update",
    "content": "content update",
    "status": "PUBLISHED",
    "published_at": "2nd May 2021 22:25:30"
}
```

### [PUT] `/api/posts/{id}/unpublish`

`id`si verilen makaleyi yayından kaldırır. Yayından kaldırılan makalenin içeriği geriye JSON olarak gönderilir. `id`si
verilen makalenin yayınlanmış olması gerekir.

**Örnek Kullanım:**

```console
$ curl --request PUT \
  --url http://localhost:8000/api/posts/2/unpublish\
  --header 'Authorization: Bearer [BURAYA ACCESS_TOKEN GELECEK]'
```

Cevap:

```json
{
    "post_id": 2,
    "user_id": 14,
    "author": "Noelia Runolfsdottir PhD",
    "title": "title update",
    "slug": "title-update",
    "content": "content update",
    "status": "DRAFT",
    "published_at": null
}
```

### [DELETE] `/api/posts/{id}/delete`

`id`si verilen makaleyi tamamen siler. Geriye sadece 204 HTTP kodu gönderir. Bu işlem geri alınamaz.

**Örnek Kullanım:**

```console
$ curl --request DELETE \
  --url http://localhost:8000/api/posts/1 \
  --header 'Authorization: Bearer [BURAYA ACCESS_TOKEN GELECEK]'
```
