<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="card-body table-responsive p-0">
        <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
        <div style="text-align: center; font-size: 20px; font-weight: bold;">DO Detail Report</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

        <!-- HEADER -->
        <table style="margin: 30px 0px 15px 1px;">
            <tr>
                <!-- DO NUMBER -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    DO Number
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['doNumber']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- TRANSPORTER -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Transporter
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['transporter']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- BUDGET -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['budget'] . " - " . $dataReport['dataHeader']['budgetName']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- DELIVERY FROM -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Delivery From
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['deliveryFrom']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- SUB BUDGET -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Sub Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['subBudget']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- DELIVERY TO -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Delivery To
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['deliveryTo']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- DATE -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Date
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['date']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                
                <!-- PIC -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    PIC
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['PIC']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- DETAIL -->
        <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        No
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        DOR Number
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Product Id
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Qty
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        UOM
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Remark
                    </div>
                </td>
            </tr>

            <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                <tr>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['no']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['dorNumber']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['productId'] . " - " . $dataDetail['productName']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['qty']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['uom']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['remark']; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <div style="height: 16px;"></div>

            <tr style="border-top: 1px solid black;">
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">Total</div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= $dataReport['totalQty']; ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>