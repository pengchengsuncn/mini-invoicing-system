<?php
    include_once("chk_permission.php");
    $_goods_typeID = $_GET["goods_typeID"];
    include_once("sql/db_conn.php");
    $sQuery = "SELECT * FROM goods_type WHERE type_id = ".$_goods_typeID."";
    $_goods_typeList = mysql_query($sQuery);
    $goods_type = mysql_fetch_array($_goods_typeList);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改商品类别</title>
    <link rel="stylesheet" href="style/css.css" type="text/css" />
</head>
<body>
    <form action="update_goods_type.php" method="post">
        <table border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#799AE1" class="tableBorder">
            <tr>
                <th colspan="2" style="height: 23px">
                    修改商品类型
                </th>
            </tr>
            <tr bgcolor="#DEE5FA"><td colspan="2" align="center" class="txlrow">&nbsp;</td></tr>
            <tr bgcolor="#DEE5FA">
                <td align="right" class="txlHeaderBackgroundAlternate">类型名</td>
                <td>
                    <input type="text" id="goods_type_name" name="goods_type_name" style="width:160px;" value="<?php echo $goods_type['type_name'] ?>">
                    <label for="goods_type_name" style="display:none;" class="error">类型名称不能为空！</label>
                </td>
            </tr>
            <tr bgcolor="#DEE5FA">
                <td align="right" class="txlHeaderBackgroundAlternate">类型描述</td>
                <td><textarea id="goods_type_type"name="goods_type_type" rows="5" style="width:300px;"><?php echo $goods_type['type_desc'] ?></textarea></td>
            </tr>
            <tr bgcolor="#DEE5FA">
                <td colspan="2" align="center" class="txlHeaderBackgroundAlternate">
                    <input type="hidden" name="goods_typeID" value="<?php echo $goods_type['type_id'] ?>" />
                    <input type="submit" value="修改" />
                    <input type="button" value="返回" onclick="javascript:window.location.href = 'show_goods_type.php'" />
                </td>
            </tr>
        </table>
    </form>
<?php
    mysql_free_result($_goods_typeList);
    mysql_close();
?>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate-1.9.0.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("form").validate({
                rules: {
                    goods_type_name: "required"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</body>
</html> 