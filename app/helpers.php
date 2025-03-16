<?php
## __showPermissionsName view
if (!function_exists('__showPermissionsName')) {
    function __showPermissionsName($data)
    {
        $permissionsName = '';
        if (!empty($data)) {
            foreach ($data as $value) {
                $permissionsName .= '<span
                                    class="px-2 py-1 text-xs font-semibold text-white bg-blue-500 rounded">' . $value->name . '</span>&nbsp;';
            }
        }

        return $permissionsName;
    }
}
