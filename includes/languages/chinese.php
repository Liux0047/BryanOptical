<?php
    //index carousel
    $carousel_item_arr = array(
        'Title 1' => '介绍 1',
        'Title 2' => '介绍 2',
        'Title 3' => '介绍 3',
        'Title 4' => '介绍 4'
    );
    
    //index.php and navbar.php
    define('TOP_SELL', '热销');
    define('MANUFACTURER', '生产商');
    define('BRYAN_OPTICAL', '布莱恩');
    define('HOME', '主页');
    define('SIGN_UP', '注册会员');
    define('NOW','立刻');
    define('SIGN_IN', '登录');
    define('FEATURED_PRODUCT_DESC','产品介绍');
    define('SIGN_IN_AS_MEMBER','会员登录');
    define('EMAIL_ADDRESS','邮箱地址');
    define('NOT_A_MEMBER','不是会员');
    define('SHOP_GLASSES', '购买眼镜');
    define('BY','By');
    define('LANGUAGE', '语言');
    define('CHOOSE_LANGUAGE','选择语言');
    define('MEN_GLASSES', '男士眼镜');
    define('WOMEN_GALSS', '女式眼镜');
    define('SUN_GLASS', '太阳眼镜');
    define('PROMOTION', '促销');
    define('ABOUT', '关于');
    define('CONTACT', '联系我们');
    define('SEARCH_PRODUCT_NAME','搜索眼镜');
    define('VIEW_ALL','查看全部');
    define('FEATURED_PRODUCT', '特别产品');
    define('ADD_TO_CART','加入购物车');
    define('VIEW_INFO','查看详细');
    define('OUR_RATING','评分');
    define('REGISTER_MEMBER','注册新会员');
    define('REMEMBERR_ME','记住我');
    define('OR_','或');
    define('CREATE_AN_ACCOUNT','创造账号');
    define('LOGIN', '登录');
    define('CLOSE','关闭');
    define('SORRY_LOGIN_FAILED','对不起，登录未成功');
    define('INVALID_EMAIL_OR_PASSWORD','账号或密码错误. 请输入正确的正好密码');
    define('FORGET_PASSWORD','忘记密码');
    define('WELCOME','欢迎您');
    define('CURRENCY','$');
    define('ITEMS','商品');
    define('LOG_OUT','登出');
    define('PRICE','价格');
    define('VIEW_IMAGE_GALLERY','查看图片库');
    
    
    //register.php
    define('SIGN_UP_NEW_MEMBER','注册新会员');
    define('ENJOY_MEMBERSHIP','轻松一点，享受会员特权和及时优惠资讯');
    define('GENDER','性别');
    define('MALE','男士');
    define('FEMALE','女士');
    define('YOUR_FIRST_NAME','名');
    define('YOUR_LAST_NAME','姓');
    define('YOUR_EMAIL_ADDRESS','邮箱地址');
    define('EMAIL','邮箱');
    define('PASSWORD','密码');
    define('CONFIRM_PASSWORD','确认密码');
    define('YOUR_PHONE_NUMBER','联系电话');
    define('YOUR_ADDRESS','地址');
    define('ADDRESS_LINE_1','地址1');
    define('ADDRESS_LINE_1_DESCRIPTION','XX路, XX单元, XXX号');
    define('ADDRESS_LINE_2','地址2');
    define('ADDRESS_LINE_2_DESCRIPTION','公寓，单元');
    define('CITY','城市');
    define('SELECT_COUNTRY','选择国家');
    define('STATE_PROVINCE_REGION','选择省区');
    define('COUNTRY','国家');
    define('POSTAL_CODE','邮编');
    define('CREATE_ACCOUNT','创建');
    define('BY_SIGNING_UP','我已经预读和同意BryanOptical的协议和条款');
    define('REQUIRED','必须');
    define('EMAIL_ALREADY_REGISTERED','邮箱已注册');
    define('OPTIONAL_FIELDS','选择');
    //countries
    define('SINGAPORE','新加坡');
    define('CHINA','中国');
    
    //glass-gallery.php
    define('REFINE_YOUR_SEARCH','精确查找');
    define('MATERIAL', '材料');
    define('SHAPE', '形状');
    define('UPDATE_RESULT','更新搜索结果');
    define('RESULTS','结果');
    define('PREV','前');
    define('NEXT','后');
    define('SORT_BY','排序by');
    define('BEST_SELLER','销量优先');
    define('RATING','评分优先');
    define('PRICE_HIGH_TO_LOW','价格优先：从高到低');
    define('PRICE_LOW_TO_HIGH','价格优先：从低到高');  
    define('ITEMS_PER_PAGE','每页显示商品数');
    define('NO_RESULT','对不起，找不您到满足要求的眼镜. 请修改筛选条件来继续搜索');
    $filter_names_display = array(
        'color' => '颜色', 
        'shape'=> '形状',
        'material'=> '材质',
        'gender' => '性别'
        );
        
    //prescription.php
    define('NO_ITEM_SELECTED','尚未选择商品');
    define('PLEASE_ENTER_PRESCRIPTION','请填写验光单');
    define('LENS_TYPE','镜片选择');
    define('SPH','SPH球面');
    define('CYL','CYL散光');
    define('AXIS','AXIS轴位');
    define('ADD','ADD加光');
    define('O_D_RIGHT','右眼');
    define('O_S_LFET','左眼');
    define('ENTER_P_D','瞳距');
    define('CONFIRM','确认');
    define('RESET_ALL_FILEDS','重设');
    
    //shopping-cart.php
    define('CART_ITEM','我的购物车');
    define('QUANTITY','数量');
    define('ITEM_PRICE','单价');
    define('ITEM_TOTAL','价格');
    define('SHOPPING_CART','购物车');
    define('PD','瞳距');
    define('PRESCRIPTION_INFO','验光单');
    define('SHOPPING_CART_TOTAL','购物车总计');
    define('SURE_TO_DELETE','确认要删除此项商品');
    define('EDIT_THIS_ORDER','编辑');
    define('REMOVE','移除');
    define('SHIPPING_ADDRESS','邮寄地址');
    define('ADDRESS_LINE_1_REQUIRED','地址1需要填写');
    define('CITY_REQUIRED','城市需要填写');
    define('STATE_REQUIRED','省份需要填写');
    define('POSTAL_CODE_REQUIRED','邮编需要填写');
    define('COUNTRY_REQUIRED','国家需要填写');
    define('NO_ITEM_IN_CART','购物车内没有商品');
    define('USE_MY_REGISTERED_ADDRESS','使用我的注册地址');
    define('CHECKOUT','结算');
    define('COULD_NOT_GET_ADDRESS','找不到您的地址');
    
        
    //search-product.php
    define('NO_PRODUCT_NAME_ENTERED','没有输入商品名');
    define('NO_SEARCH_RESULT','对不起，没有找到你需要的商品. 请重新输入再次搜索');
    define('YOU_HAVE_SEARCHED_FOR','你正在搜索');

    //scripts.php
    define('YOU_MUST_LOG_IN','对不起，请先登录');
    
?>
