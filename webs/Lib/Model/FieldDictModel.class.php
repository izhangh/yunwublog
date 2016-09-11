<?php
class FieldDictModel extends CommonModel{
    // 自动验证设置
    protected $_validate = array(
        
    );
    // 自动填充设置
    protected $_auto = array(        
		array('operator','getUserId',3,'callback'),
        array('update_date','getDate',3,'callback'),
    );
}
?>
