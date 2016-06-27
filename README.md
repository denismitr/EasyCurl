##Installation
    composer require denismitr/easy-curl

###Usage

A recaptcha example:
```php
$captchaResponse = EasyCurl::post(config('services.recaptcha.url'))
            ->send([
                'secret' => config('services.recaptcha.secret'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip()
            ])
            ->getDecodedResponse();

        if ( ! isset($captchaResponse->success) || ! $captchaResponse->success) {
            abort(400, 'Нет, нет, нет!');
        }
```
