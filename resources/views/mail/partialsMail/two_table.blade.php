<table class="es-left " cellspacing="0" cellpadding="0" align="left" role="none"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
    @php /** @var \App\Models\Product $product */ @endphp
    <tr style="border-collapse:collapse">
        <td class="es-m-p0r es-m-p20b" align="center" style="padding:0;Margin:0;width:173px">
            <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                <tr style="border-collapse:collapse">
                    <td align="center" style="padding:0;Margin:0;padding-top:5px;font-size:0">
                        <a
                                target="_blank"
                                href="{{route('product', $product->slug)}}"
                                style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#F09870;font-size:14px"
                        >
                            <img
                                    class="adapt-img"
                                    src="{{$product->img_jpg}}"
                                    alt="{{$product->title}}"
                                    title="{{$product->title}}"
                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                    width="173"
                            >
                        </a>
                    </td>
                </tr>
                <tr style="border-collapse:collapse">
                    <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                        <h3
                                style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:tahoma, geneva, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333"
                                class="product-name"
                        >
                            {{$product->title}}
                        </h3>
                    </td>
                </tr>
                <tr style="border-collapse:collapse">
                    <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-left:10px;padding-right:10px">
                        <span class="es-button-border"
                              style="border-style:solid;border-color:#333333;background:#FFFFFF;border-width:2px;display:block;border-radius:0px;width:auto">
                            <a
                                    href="{{$product->slug}}"
                                    class="es-button"
                                    target="_blank"
                                    style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#333333;font-size:16px;display:block;background:#FFFFFF;border-radius:0px;font-family:Arial, sans-serif;font-weight:bold;font-style:normal;line-height:19px;width:auto;text-align:center;padding:5px 0px;mso-padding-alt:0;mso-border-alt:10px solid #FFFFFF"
                            >
                                buy now
                            </a>
                        </span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table><!--[if mso]></td>
<td style="width:20px"></td>
<td style="width:173px"><![endif]-->