送信された場所：{{ $content['place'] }}
お名前：{{ $content['from_name'] }}
メールアドレス：{{ $content['from'] }}
@if(isset($content['type']))
お問い合わせ種類：{{ $content['type'] }}
@endif
@isset($content['url'])
送信されたURL: {{ $content['url'] }}
@endisset
@if(isset($content['tel']))
電話番号：{{ $content['tel'] }}
@endif
@if(isset($content['postal']))
郵便番号：{{ $content['postal'] }}
@endif
@if(isset($content['address']))
住所：{{ $content['address'] }}
@endif
@if(isset($content['body']))
お問い合わせ内容
{{ $content['body'] }}
@endif
