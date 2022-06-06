<?php


/**
 * Setting Name
 *
 * @param $name
 * @return mixed
 */
function getsetting($name)
{
    $setting = \App\Models\Setting::where('name', $name)->first();
    if (! $setting) {
        return "";
    }

    return $setting->value;
}

function getMeta($name)
{
    $setting = \App\Models\MetaPage::wherePage($name)->first();
    if (! $setting) {
        return "";
    }

    return $setting->meta;
}

function getTaxesPercent()
{
    return 5;
}

/**
 * Upload Path
 *
 * @return string
 */
function uploadpath()
{
    return 'photos';
}

/**
 * Get Image
 *
 * @param $filename
 * @return string
 */
function getimg($filename)
{
    $base_url = url('/');
    if (! $filename) {
        return '';
    }

    return $base_url.'/storage/'.$filename;
}

function uploader($request, $img_name)
{
    $file = $request->file($img_name);
    $fileHash = str_replace('.'.$file->extension(), '', $file->hashName());
    $fileName = $fileHash.'.'.$request->file($img_name)->getClientOriginalExtension();
    $path = \Storage::disk('public')->putFileAs(uploadpath(), $file, $fileName);

    return $path;
}

function saveImage($file, $folder = '/')
{
    $fileName = date('YmdHis').'-'.$file->getClientOriginalName();;
    $path = \Storage::disk('public')->putFileAs(uploadpath(), $file, $fileName);

//    return 'storage/' . $path;
    return $path;
}

/**
 * Upload an image
 *
 * @param $img
 */
function Arrayuploader($request, $img_name, $i)
{
    $path = \Storage::disk('public')->putFile(uploadpath(), $request->file($img_name)[$i]);

    return $path;
}

function statuss($status = null)
{
    $collect = [
        'new' => 'جديد',
        'prepared' => 'قيد التجهيز',
        'delivered' => 'تم التوصيل',
        'canceled' => 'تم الالغاء',
    ];
    if ($status == null) {
        return $collect;
    }

    return $collect[$status];
}

function discountTypes()
{
    $collect = [
        'discount_time_max' => 'خصم على منتج لفترة معينة و حد أقصى للطلب',
        'discount_quantity' => 'خصم على الكمية من نفس المنتج',
        'all_products' => 'خصم على كل المنتجات',
        'cart_discount' => 'خصم على سلة الشراء',
    ];

    return $collect;
}

function offerTypes()
{
    $collect = [
        'oneplusone' => 'منتج + منتج مجانى',
        'twoplusone' => 'منتجين + منتج مجانى',
    ];

    return $collect;
}

function multiUploader($request, $img_name, $model, $onId = null)
{
    foreach ($request[$img_name] as $image) {
        $filename = rand(99999, 99999999).$image->getClientOriginalName();
        $path = \Storage::disk('public')->putFile(uploadpath(), $image);
        $model->create(['image' => $path] + $onId);
    }

    return true;
}

// function multiUploaderWithmodelproduct($request, $img_name, $model, $onId = null, $lawyer_id)
// {
//     $images = [];
//     $i = 0;
//     foreach ($request[$img_name] as $image) {
//         $path = \Storage::disk('public')->putFile(uploadpath(), $image);
//         $images[$i] = $path;
//         $i++;
//         $model->create(['image' => $path, 'product_id' => $lawyer_id,]);
//     }

//     return $images;
// }

function deleteImg($img_name)
{
    \Storage::disk('public')->delete(uploadpath(), $img_name);

    return true;
}

function status()
{
    $array = [
        '1' => 'مفعل',
        '0' => 'غير مفعل',
    ];

    return $array;
}

function shirt_types()
{
    $array = [
        'women' => 'نسائي',
        'men' => 'رجالي',
    ];

    return $array;
}

function badges()
{
    $array = [
        'new' => 'جديد',
        'hot' => 'ساخن',
        'discount' => 'خصم',
    ];

    return $array;
}

function roles()
{
    $array = [
        'client' => 'عميل',
        'owner' => 'صاحب منشأة',
    ];

    return $array;
}

function rates()
{
    $array = [
        '0' => 'لا يوجد',
        '1' => 'سئ',
        '2' => 'مقبول',
        '3' => 'جيد',
        '4' => 'جيد جداً',
        '5' => 'ممتاز',
    ];

    return $array;
}

function cities()
{
    $cities = App\Models\City::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $cities;
}

function districts()
{
    $districts = App\Models\District::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $districts;
}

function trades()
{
    $cities = App\Trade::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $cities;
}

function products()
{
    $products = \App\Models\Product::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $products;
}

function carts()
{
    $carts = \App\Models\Cart::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['id']];
    });

    return $carts;
}

function users()
{
    $users = \App\Models\User::whereIsAdmin(0)->get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['name']];
    });

    return $users;
}

function banks()
{
    $banks = \App\Models\Bank::whereIsActive(1)->get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['name']];
    });

    return $banks;
}

function sub_categories()
{
    $cities = Category::latest()->Categories()->get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['ar_name']];
        });

    return $cities;
}

function sizes()
{
    $cities = \App\Models\Size::get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $cities;
}

function ProductSizes()
{
    $sizes = \App\Models\ProductSize::get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item->product->name.' - '.$item->size->name];
    });

    return $sizes;
}

function getFullQuantityInStore()
{
    $increase = \App\Models\Quantity::whereType('increase')->sum('quantity');
    $decrease = \App\Models\Quantity::whereType('decrease')->sum('quantity');

    return $increase - $decrease;
}

function regions()
{
    $regions = App\Models\Region::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $regions;
}

//function users()
//{
//    $countries = App\User::all()->mapWithKeys(function ($item) {
//        return [$item['id'] => $item['first_name']];
//    });
//    return $countries;
//}
function permissions()
{
    $countries = App\Permission::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['title']];
    });

    return $countries;
}

function categories()
{
    $countries = App\Category::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $countries;
}

function GenerateCode()
{
    $code = str_random(6); // better than rand()
    // call the same function if the barcode exists already
    if (UniqueCode($code)) {
        return GenerateCode();
    }

    // otherwise, it's valid and can be used
    return $code;
}

function UniqueCode($code)
{
    return \App\Coupon::where('code', $code)->first();
}

function fcm_server_key()
{
    return 'AAAA_gIV45E:APA91bFHDVKPFD5wbOEk9yDOYaUqB-fF29o4x5lPZ7dAARMyqxJggzJzqjotWhPd4AoLALQWyrkSAAWSIUPawlGKSrqf7JYpRqxmIyE7OWBF41JbAIgFq-h2zBfaygYsMlA5dEK_pLHR';
}

function user()
{
    return auth()->user();
}

function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2)
{
    // Calculate the distance in degrees
    $degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));

    // Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
    switch ($unit) {
        case 'km':
            $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
            break;
        case 'mi':
            $distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
            break;
        case 'nmi':
            $distance = $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
    }

    return round($distance, $decimals);
}

function check_null($var)
{
    if (isset($var)) {
        if (! is_null($var)) {
            return $var;
        }
        if (is_int($var)) {
            return 0;
        }

        return "";
    }

    return "";
}

function except_values($collection, $arr)
{
    $collection = $collection->map(function ($item) use ($arr) {
        return collect($item)->except($arr)->toArray();
    });

    return $collection;
}

function slug($name)
{
    return $name.'-'.str_random(30);
}

function GetDistance()
{

    $setting = \App\Setting::where('name', 'distance')->first();
    if (! $setting) {
        return 0;
    }

    return $setting->ar_value;
}

function GetNearDistanceFirms()
{

    $setting = \App\Setting::where('name', 'near_distance')->first();
    if (! $setting) {
        return 100;
    }

    return $setting->ar_value;
}

function getBounsFees()
{
    return 5;
}

function get()
{
    return 5;
}

function make_transaction($value, $type, $cart_id = null)
{
    return \App\Transaction::create([
        'value' => $value,
        'type' => $type,
        'cart_it' => $cart_id,
        'user_id' => auth()->user()->id,
    ]);
}

function notifyGeneral($message, $users, $cart)
{
    $data = ['cart_id' => $cart->id, 'status' => $cart->status, 'type' => 'cart'];

    notifyByFirebase("هناك إشعار جديد", $message, $users->pluck('fcm_token_android'), $data, 0);
    foreach ($users as $user) {
        $user->notify(new \App\Notifications\GeneralNotifications($user, $message, $cart));
    }
}

function notifyByFirebase($title, $body, $token, $data = [], $is_notification = true)
{


    $single_id = $token;

    $fcmMsg = [
        'body' => $body,
        'title' => $title,
        'data' => $data,
        'click_action' => 'FCM_PLUGIN_ACTIVITY',
        'sound' => "default",
        'color' => "#203E78",
    ];

    $fcmFields = [
        'to ' => $single_id,
        'registration_ids' => $token,
        'click_action' => 'FCM_PLUGIN_ACTIVITY',
        'data' => $data,
    ];
    if ($is_notification) {
        $fcmFields['notification'] = $fcmMsg;
    }

    $headers = [
        'Authorization: key='.fcm_server_key(),
        'Content-Type: application/json',
    ];

    /*        info("API_ACCESS_KEY_client: ".env('API_ACCESS_KEY_client'));
            info("PUSHER_APP_ID: ".env('PUSHER_APP_ID'));*/

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

function calcPrice($distance, $time)
{
    if ($time <= 15) {
        $price = 4 + ($distance * .90);
    } else {
        $price = 4 + ($distance * .90) + ($time * .25);
    }

    return intval($price);
}

function GetDistanceBetweenTwoLocations($first_location, $second_location)
{
    $first_location = explode(',', $first_location);
    $second_location = explode(',', $second_location);

    return distanceCalculation($first_location['0'], $first_location['1'], $second_location['0'], $second_location[1],
        'km', '2');
}

function days($d)
{
    $days = [
        'sat' => 'السبت',
        'sun' => 'الأحد',
        'mon' => 'الأثنين',
        'tues' => 'الثلاثاء',
        'wed' => 'الأربعاء',
        'thrs' => 'الخميس',
        'fri' => 'الجمعة',
    ];

    return $days[$d];
}

function address_types()
{
    $types = [
        'villa' => 'فيلا',
        'flat' => 'شقة',
        'shop' => 'محل',
        'work' => 'عمل',

    ];

    return $types;
}

function in_group($roles)
{
    return in_array(auth()->user()->role, $roles);
}

function productBadgeClassName()
{
    [
        'new' => 'new',
        'hot' => 'hot',
        'discount' => 'off',
    ];
}

function colors()
{
    $colors = [
        "black" => [0, 0, 0],
        "green" => [0, 128, 0],
        "silver" => [192, 192, 192],
        "lime" => [0, 255, 0],
        "gray" => [128, 0, 128],
        "olive" => [128, 128, 0],
        "white" => [255, 255, 255],
        "yellow" => [255, 255, 0],
        "maroon" => [128, 0, 0],
        "navy" => [0, 0, 128],
        "red" => [255, 0, 0],
        "blue" => [0, 0, 255],
        "purple" => [128, 0, 128],
        "teal" => [0, 128, 128],
        "fuchsia" => [255, 0, 255],
        "aqua" => [0, 255, 255],
    ];

    return $colors;
}

function html2rgb($color)
{
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
    if (strlen($color) == 6) {
        [$r, $g, $b] = [
            $color[0].$color[1],
            $color[2].$color[3],
            $color[4].$color[5],
        ];
    } elseif (strlen($color) == 3) {
        [$r, $g, $b] = [
            $color[0].$color[0],
            $color[1].$color[1],
            $color[2].$color[2],
        ];
    } else {
        return false;
    }

    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);

    return [$r, $g, $b];
}

function distancel2(array $color1, array $color2)
{
    return sqrt(pow($color1[0] - $color2[0], 2) + pow($color1[1] - $color2[1], 2) + pow($color1[2] - $color2[2], 2));
}

function getHexaFromColor($value)
{

    $distances = [];
    $val = html2rgb($value);
    foreach (colors() as $name => $c) {
        $distances[$name] = distancel2($c, $val);
    }

    $mincolor = "";
    $minval = pow(2, 30); /*big value*/
    foreach ($distances as $k => $v) {
        if ($v < $minval) {
            $minval = $v;
            $mincolor = $k;
        }

        return $mincolor;
    }
}

function checkFav($product_id)
{
    $wishlist = \App\Models\Favourite::where('product_id', $product_id)->where('user_id', auth()->user()->id)->first();
    if ($wishlist) {
        return true;
    }

    return false;
}

function cartCount()
{
    $user = auth()->user();
    $cart = \App\Models\Cart::where('user_id', $user->id)->where('status', 'opening')->first();
    if (! $cart) {
        return 0;
    }

    return $cart->items->count();
}

function shippingFees()
{
    if (getsetting('shipping_fees') == "") {
        return 10;
    }

    return getsetting('shipping_fees');
}

function taxesFees()
{
    if (getsetting('taxes_fees') == "") {
        return 10;
    }

    return getsetting('taxes_fees');
}

function addresses()
{
    $address = App\Address::whereUserId(auth()->user()->id)->get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['address_name']];
    });

    return $address;
}

function banner_positions()
{
    return [
        'head' => 'السلايدر العلوي',
        'sub_head' => 'السلايدر الفرعي',
        'middle' => 'السلايدر الوسطي',
    ];
}

function title_positions()
{
    return [
        'center' => 'وسط',
        'right' => 'يمين',
        'left' => 'يسار',
    ];
}

function cart_status()
{
    return [
        //'opening' => 'لم يتم تأكيدها',
        'waiting' => 'في انتظار الموافقة',
        'refused' => 'مرفوضة',
        'accepted' => 'تم الموفقة عليها',
        'cancelled' => 'ملغاه',
        'deliverd' => 'تم التوصيل',
    ];
}
function payment_types()
{
    return [
        'cash' => 'الدفع عند الاستلام',
        'card' => ' بطاقة ائتمان',
        'bank' => 'تحويل بنكى',
        'points' => 'المحفظة',
    ];
}

function coupons()
{
    $coupons = \App\Models\Coupon::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['code']];
    });

    return $coupons;
}

//////////////////////////////////////////////////////////////////////////////

function uploadImage($file, $img)
{
    return \Storage::disk('public')->putFile($file, $img);
}

function deleteImage($file, $img)
{
    \Storage::disk('public')->delete($file, $img);

    return true;
}

function getImgPath($img)
{
    if (is_null($img)) {
        return '';
    }

    return url('/').'/storage/'.$img;
}

function notifyTypes($notify)
{
    if ($notify->type == 'App\Notifications\CartStatusNotification') {
        $data = json_decode($notify->data);
        //$cart = \App\Models\Cart::find($data->cart->id);
        //if ($cart) {
        //    return 'cart_status_change';
        //}
    } elseif ($notify->type == 'App\Notifications\UserNotification') {
        return 'اشعار من الادارة';
    } elseif ($notify->type == 'App\Notifications\CartBankTransfareStatus') {
        $data = json_decode($notify->data);
        $cart = \App\Models\Cart::find($data->cart->id);
        if ($cart) {
            return 'حالة التحويل البنكى';
        }
    }
}

function notifyDataObject($notify)
{
    if ($notify->type == 'App\Notifications\CartStatusNotification') {
        $data = json_decode($notify->data);
        //$cart = \App\Models\Cart::find($data->cart->id);
        //if ($cart) {
        //    return __('Cart Number')." - ".$cart->id." - ".__('Status changed to')." : ".__($cart->status);
        //}
    } elseif ($notify->type == 'App\Notifications\CartBankTransfareStatus') {
        $data = json_decode($notify->data);
        $cart = \App\Models\Cart::find($data->cart->id);
        if ($cart) {
            return __('Cart Number')." - ".$cart->id." - ".__('Bank Transfare Status')." : ".__($cart->bank_transfer_status);
        }
    } elseif ($notify->type == 'App\Notifications\UserNotification') {
        $data = json_decode($notify->data);

        return "<li>".__('Notification Title')." : ".$data->data->title."</li>"."<li>".__('Notification Body')." : ".$data->data->body."</li>";
        //return __('Notification Title') . " - " . $data->data->title . " - " . __('Notification Body') . " : " . $data->data->body;
    }
}

function notifyUser($notify)
{
    if ($notify->type == 'App\Notifications\CartStatusNotification') {
        $data = json_decode($notify->data);
        //$cart = \App\Models\Cart::find($data->cart->id);
        //if ($cart) {
        //    return $cart->user->name;
        //}
    } elseif ($notify->type == 'App\Notifications\CartBankTransfareStatus') {
        $data = json_decode($notify->data);
        $cart = \App\Models\Cart::find($data->cart->id);
        if ($cart) {
            return $cart->user->name;
        }
    } elseif ($notify->type == 'App\Notifications\UserNotification') {
        $data = json_decode($notify->data);
        $user = \App\Models\User::findOrFail($data->data->user_id);

        return $user->name;
    }
}

function price_after_coupon_discount($coupon, $product, $price): float
{
    if (! $coupon) {
        return $price;
    }
    if (($coupon->products_in && in_array($product->id,
                $coupon->products_in)) || ($coupon->products_out && ! in_array($product->id,
                $coupon->products_out)) || (! $coupon->products_in && ! $coupon->products_out)) {

        if (($coupon->exclude_products_discount == 1 && empty($product->discount['type'])) || $coupon->exclude_products_discount == 0) {
            $price = round($price - ($price * $coupon->value / 100), 2);
        }
    }

    return $price;
}

function cart()
{
    if (auth()->guest()) return 0;
    $cart = auth()->user()->carts()->firstWhere('status', 'opening');
    if (!$cart) return 0;
    return $cart->items()->count();
}

function getLangMessage($key, $lang)
{
    $data = [
        'ar' => [
            'order_refused' => 'تم رفض الطلب',
            'order_refused_body' => 'تم رفض الطلب الخاص بك من قبل الادارة',
            'order_accepted' => 'تم قبول الطلب',
            'order_accepted_body' => 'تم قبول الطلب الخاص بك من قبل الادارة وجاري تجهيزه',
            'order_cancelled' => 'تم إلغاء الطلب',
            'order_cancelled_body' => 'تم إلغاء الطلب الخاص بك',
            'order_deliverd' => 'تم تسليم الطلب',
            'order_deliverd_body' => 'تم تسليم الطلب الخاص بك نشركك لاستخدامك متجرنا',
            'order_new' => 'طلب جديد',
            'order_new_body' => 'يوجد طلب جديد ',
            'transfer_refused' => 'رفض التحويل',
            'transfer_refused_body' => 'تم رفض التحويل البنكى الخاص بك',
            'transfer_accepted' => 'قبول التحويل',
            'transfer_accepted_body' => 'تم قبول التحويل البنكى الخاص بك',
        ],
        'en' => [
            'order_refused' => 'Order Refused',
            'order_refused_body' => 'Admin refuse your order',
            'order_accepted' => 'Order Accepted',
            'order_accepted_body' => 'Your order accepted and on processing',
            'order_cancelled' => 'Order Cancelled',
            'order_cancelled_body' => 'Your order was cancelled by admin',
            'order_deliverd' => 'Order delivered',
            'order_deliverd_body' => 'Your order delivered thanks for shopping from our store',
            'order_new' => 'New Order',
            'order_new_body' => 'New Order from client',
            'transfer_refused' => 'Bank transfer refused',
            'transfer_refused_body' => 'Your bank transfer for order refused and is incorrect',
            'transfer_accepted' => 'Bank transfer Accepted',
            'transfer_accepted_body' => 'Your bank transfer for order Accepted',
        ],
    ];
    return $data[$lang][$key];
}

function unReadNotification()
{
    $user = auth()->user();
    return $user->unreadNotifications()->latest()->get();
}

function check_code_marketer($code, $type)
{
    $marketer = \App\Models\Marketer::whereCode($code)->where('has_value_on', $type)->first();
    if ($marketer) {
        if ($type == 'enter') {
            $viewed = \App\Models\SiteView::where('ip', request()->ip())->first();
            if (!$viewed) {
                $marketer->increment('balance', $marketer->value);
                \App\Models\SiteView::create(['ip' => request()->ip()]);
            }
        } elseif ($type == 'register') {
            $marketer->increment('balance', $marketer->value);
            return $marketer->id;
        }

    }
}

function addBalanceToMarketer($order)
{
    if ($order->user()->whereHas('marketer')->exists()) {
        $marketer = $order->user->marketer;
        $total = $marketer->percentage * $order->total / 100;
        if ($marketer->has_percentage_on == 'first_order' && $order->user->carts()->count() == 1) {
            $marketer->increment('balance', $total);
        } elseif ($marketer->has_percentage_on == 'all_order') {
            $marketer->increment('balance', $total);
        }
    }
}
