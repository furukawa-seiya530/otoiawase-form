<?php

return [
    'required' => ':attribute を入力してください。',
    'email' => ':attribute は正しい形式で入力してください。',
    'max' => ':attribute は :max 文字以内で入力してください。',
    'digits' => ':attribute は :digits 桁で入力してください。',
    'in' => ':attribute を正しく選択してください。',

    'attributes' => [
        'first_name' => '姓',
        'last_name' => '名',
        'gender' => '性別',
        'email' => 'メールアドレス',
        'phone1' => '電話番号（先頭）',
        'phone2' => '電話番号（中間）',
        'phone3' => '電話番号（最後）',
        'address' => '住所',
        'building' => '建物名',
        'category_id' => 'お問い合わせカテゴリ',
        'inquiry_content' => 'お問い合わせ内容',
    ],

    'custom' => [
        'phone1' => [
            'digits' => '電話番号は :digits 桁の数字で入力してください。',
        ],
        'phone2' => [
            'digits' => '電話番号は :digits 桁の数字で入力してください。',
        ],
        'phone3' => [
            'digits' => '電話番号は :digits 桁の数字で入力してください。',
        ],
        'inquiry_content' => [
            'max' => 'お問い合わせ内容は :max 文字以内で入力してください。',
        ],
    ],
];
