<?php
function ResponseJson($status, $msg, $data = null)
{
    $response = [
        'status' => $status,
        'message' => $msg,
        'data' => $data,
    ];
    return response()->json($response);
}

function settings($key)
{
    $settings = \App\Models\Setting::where('key', $key)->first();

    if ($settings) {
        return $settings;
    } else {
        return new \App\Models\Setting;
    }
}


function qtyDefaultValue($qty)
{
    if (isset($qty)) {
        return $qty;
    } else {
        return 1;
    }
}
?>
