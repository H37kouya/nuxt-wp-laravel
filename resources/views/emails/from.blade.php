送信された場所：{{ $content['place'] }}
お名前：{{ $content['from_name'] }}
メールアドレス：{{ $content['from'] }}
@isset($content['type'])
お問い合わせ種類：{{ $content['type'] }}
@endisset
@isset($content['url'])
送信されたURL: {{ $content['url'] }}
@endisset
@isset($content['tel'])
電話番号：{{ $content['tel'] }}
@endisset
@isset($content['postal'])
郵便番号：{{ $content['postal'] }}
@endisset
@isset($content['address'])
住所：{{ $content['address'] }}
@endisset
@isset($content['body'])
お問い合わせ内容
{{ $content['body'] }}
@endisset
