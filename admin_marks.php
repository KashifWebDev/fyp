<?php
require 'parts/app.php';

$student_id = $_GET["student_id"];
$course_id = $_GET["course_id"];
$year = $_GET["year"] ?? '2024';

if(isset($_GET["month"])){
    $month = $_GET["month"];
    $sql = "SELECT * FROM grades WHERE student_id=$student_id AND month='$month' AND course_id='$course_id' ORDER BY id DESC";
}else{
    $sql = "SELECT * FROM grades WHERE student_id=$student_id AND course_id='$course_id' ORDER BY id DESC";
}

$res = mysqli_query($con, $sql);

if(!mysqli_num_rows($res)){
    js_alert("No records found!");
    js_redirect("admin_dashboard.php");
}

$row = mysqli_fetch_array($res);
$instructor_id = $row["instructor_id"];

$sql = "SELECT * FROM master_registration_list WHERE id=$student_id";
$res = mysqli_query($con, $sql);
$student_row = mysqli_fetch_array($res);

$sql = "SELECT * FROM courses WHERE id=$course_id";
$res = mysqli_query($con, $sql);
$course_row = mysqli_fetch_array($res);

$sql = "SELECT * FROM instructors WHERE id=$instructor_id";
$res = mysqli_query($con, $sql);
$instructor_row = mysqli_fetch_array($res);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Mark Sheet</TITLE>
<META name="generator" content="BCL easyConverter SDK 5.0.252">
<META name="title" content="21.05-Found1.Exam/210205-CD1019-32">
<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;margin: 11px 0px 34px 65px;padding: 0px;border: none;width: 751px;}
#page_1 #id1_1 {border:none;margin: 14px 0px 0px 134px;padding: 0px;border:none;width: 617px;overflow: hidden;}
#page_1 #id1_2 {border:none;margin: 74px 0px 0px 3px;padding: 0px;border:none;width: 680px;overflow: hidden;}
#page_1 #id1_2 #id1_2_1 {float:left;border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 453px;overflow: hidden;}
#page_1 #id1_2 #id1_2_2 {float:left;border:none;margin: 1px 0px 0px 2px;padding: 0px;border:none;width: 225px;overflow: hidden;}
#page_1 #id1_3 {border:none;margin: 8px 0px 0px 4px;padding: 0px;border:none;width: 747px;overflow: hidden;}

#page_1 #p1dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:683px;height:946px;}
#page_1 #p1dimg1 #p1img1 {width:683px;height:946px;}




.dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

.ft0{font: 33px 'Arial';color: #424242;line-height: 38px;}
.ft1{font: 13px 'Calibri';color: #666666;line-height: 17px;}
.ft2{font: 13px 'Calibri';color: #666666;line-height: 15px;}
.ft3{font: bold 28px 'Calibri';line-height: 35px;}
.ft4{font: bold 15px 'Calibri';line-height: 18px;}
.ft5{font: 15px 'Calibri';line-height: 18px;}
.ft6{font: 1px 'Calibri';line-height: 1px;}
.ft7{font: bold 14px 'Calibri';line-height: 17px;}
.ft8{font: 14px 'Calibri';line-height: 17px;}
.ft9{font: bold 21px 'Calibri';color: #434343;line-height: 26px;}
.ft10{font: bold 21px 'Calibri';color: #ffffff;line-height: 26px;}
.ft11{font: 1px 'Calibri';line-height: 2px;}
.ft12{font: 16px 'Calibri';line-height: 19px;}
.ft13{font: 16px 'Calibri';color: #ffffff;line-height: 19px;}
.ft14{font: 1px 'Calibri';line-height: 4px;}
.ft15{font: bold 16px 'Calibri';color: #424242;line-height: 19px;}
.ft16{font: bold 17px 'Calibri';line-height: 21px;}
.ft17{font: 15px 'Calibri';color: #666666;line-height: 18px;}
.ft18{font: bold 15px 'Calibri';color: #666666;line-height: 18px;}

.p0{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: left;padding-right: 274px;margin-top: 0px;margin-bottom: 0px;}
.p2{text-align: left;margin-top: 3px;margin-bottom: 0px;}
.p3{text-align: left;padding-left: 158px;margin-top: 0px;margin-bottom: 0px;text-indent: -158px;}
.p4{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p5{text-align: right;padding-right: 63px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p6{text-align: right;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p7{text-align: left;padding-left: 14px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p8{text-align: right;padding-right: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p9{text-align: left;padding-left: 28px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p11{text-align: right;padding-right: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p12{text-align: left;padding-left: 37px;margin-top: 17px;margin-bottom: 0px;}
.p13{text-align: left;padding-left: 3px;margin-top: 39px;margin-bottom: 0px;}

.td0{padding: 0px;margin: 0px;width: 365px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 60px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 219px;vertical-align: bottom;}
.td3{padding: 0px;margin: 0px;width: 222px;vertical-align: bottom;}
.td4{padding: 0px;margin: 0px;width: 203px;vertical-align: bottom;}
.td5{padding: 0px;margin: 0px;width: 110px;vertical-align: bottom;}
.td6{padding: 0px;margin: 0px;width: 112px;vertical-align: bottom;}
.td7{padding: 0px;margin: 0px;width: 143px;vertical-align: bottom;}
.td8{padding: 0px;margin: 0px;width: 279px;vertical-align: bottom;}
.td9{padding: 0px;margin: 0px;width: 255px;vertical-align: bottom;}
.td10{padding: 0px;margin: 0px;width: 289px;vertical-align: bottom;}
.td11{padding: 0px;margin: 0px;width: 204px;vertical-align: bottom;}
.td12{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 50px;vertical-align: bottom;}
.td13{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 239px;vertical-align: bottom;}
.td14{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 204px;vertical-align: bottom;}
.td15{border-left: #000000 1px solid;padding: 0px;margin: 0px;width: 49px;vertical-align: bottom;}
.td16{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 238px;vertical-align: bottom;}
.td17{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 203px;vertical-align: bottom;}
.td18{border-left: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 49px;vertical-align: bottom;}
.td19{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 238px;vertical-align: bottom;}
.td20{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 203px;vertical-align: bottom;}
.td21{border-left: #000000 1px solid;border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 287px;vertical-align: bottom;}
.td22{border-left: #000000 1px solid;border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 287px;vertical-align: bottom;}
.td23{padding: 0px;margin: 0px;width: 296px;vertical-align: bottom;}
.td24{padding: 0px;margin: 0px;width: 252px;vertical-align: bottom;}
.td25{padding: 0px;margin: 0px;width: 107px;vertical-align: bottom;}

.tr0{height: 21px;}
.tr1{height: 28px;}
.tr2{height: 24px;}
.tr3{height: 31px;}
.tr4{height: 2px;}
.tr5{height: 23px;}
.tr6{height: 4px;}
.tr7{height: 18px;}

.t0{width: 644px;font: 15px 'Calibri';}
.t1{width: 493px;margin-left: 35px;margin-top: 21px;font: 16px 'Calibri';}
.t2{width: 655px;margin-left: 3px;margin-top: 9px;font: bold 15px 'Calibri';color: #666666;}
/*TR:nth-child(3) { text-align: center; }*/
</STYLE>
</HEAD>

<BODY>
<DIV id="page_1">
<DIV id="p1dimg1">
<IMG src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAqsAAAOzCAIAAAAQi9jkAAAgAElEQVR4nO3dfdyVdWHH8d+5uVHkKR5FVORBsVKBiFizoGSZiJUtn83RNOecqAudvnJT2mvDai50E51ur9rLVyydNp/ZLNhKbfjQ0hxNG5E0NFBBCMWJGA/X/rhent3xcN83SIp+3+8/eF3nnN+5znX45/e5r3M9NKqqKgBAmJY3ewMAgDeBAgCARAoAABIpAABIpAAAIFHrLl/jyy+/vHr16ldffbV3796DBg3a5esHAF6/XbMPYMKECY3X9OzZ88Mf/vCCBQtaW/8/L1atWrVLPggA2CUar+d6AL/zO79z4403Nh/+9V//9ec+97ldsVUAwK/XTv4K8Mtf/nK//fZr/mX/iU984u6779562KZNm0opXbp02entAwB+HXbmV4BJkybtueee9fR/7LHHVlXVnP7nzJnTaKO1tbW1tbX5cJ999lmxYsWu3HwAYKfs8K8AjUajufzMM88MHjy4Xu7atevGjRs7uZKpU6fOmTNnhz4XANiFdmwfQNvpv6qqevq/8sorG41Gc/ofMWLE7NmzN27cWP2q//iP/xg5cmQ95h/+4R8ajcasWbN20bcAAHbMDuwDaPtXfvNdEydOXLBgQb3cpUuXNWvW9OrVq52VrFu37tOf/vRdd91VP3zqqacOOOCAndlwAOB16Ow+gBkzZjSn/0WLFtULhx12WD39H3LIIVVVbdy4sf3pv5TSvXv3O++8s6qqMWPGlFKGDh3685//fCe3HQDYWZ3dB9Dc/3/ggQc++eSTpZTZs2fX5/4tWrTone98505+fKNRnEYIAG+4ThVAnz59XnzxxXq5Hn/11VdPnz69tPk5YOe3oNHYJesBADqv418BVq1a1Zz+u3XrVi/U0//LL7/8+rdgw4YNpZQLL7zw9a8KAOikjvcBtD0AcPPmzY1G44UXXujbt+8Xv/jFP/mTP9ll29F4XVcnBAB2SMf7AJrT/5QpU+o99sOHDz/77LN34fRfSrnkkkuWL1++C1cIALSj47+8m8cAPvroo+9973vLr+3v9WnTpl133XW7fLUAwNY62AfwyCOPNJfr6b+TzjjjjEaj0aVLlxEjRhx55JGDBw9uNBrNKwds0/XXX9/59QMAr0cHBXDHHXds/eT8+fPbecvIkSNHjhx5ww03LF269P777584ceJ3vvOd5557rpQyceLERqNx3333bfONc+fO7exWAwCvTwf780888cRbb721Xu7Mnv/mDwQPPvhgjx493vOe92xz2FVXXXXBBRds8eTmzZtLKS0tO3OzIgBgh3Qw3ba9EUCHHnnkkTVr1sydO3fIkCHf+c53tjf9l+2c+9fS0mL6B4A3xnZn3Pov8lGjRnVyRUuWLJkzZ06fPn3+8R//cdGiRYMGDerXr9/kyZP79OnTv3//rcdv88lSyquvvtrJTwQAdtp2C2DhwoWllBNOOKGTKxozZszs2bMvvvji/fbb76abbjr77LN/8YtfzJs379RTTx0zZszJJ59cSvmLv/iL8tp+hb333vvqq6/eej0XX3zxTnwNAGCHbPc4gPPPP/+aa64pbX4IaP84gFdeeWWvvfZav379TTfddOaZZ2494MILL7zqqqtKKcuXL99vv/2qqho4cODzzz+/xbBjjjnmnnvu2YlvAgB03nb3AcyZM2eLZ9rZP19V1V577VVKmTt37jan/1JKfUfgoUOH7rvvvu9617tKKaeffvrWwwYNGtTxVgMAr892C2Dt2rX1oQDNH+w/+clPbm/wsmXLbrjhhieeeOKOO+6od/hvbcmSJQcffPDSpUtLKRdddNHJJ5+89Qqrqpo0adIOfoU3x80339yzZ8/LLrus3rGxQ4dMAsCbbrsFcNBBB/3Gb/xGKWXFihX1M/PmzaubYGu9e/c+44wzDj300B/84AfTp0+/7bbbWlpahg8fvsWwxYsXb968+fTTT1+zZs0tt9zys5/9bIsBH/zgBz/xiU/s/Ld5A51yyikHHXTQ5Zdf/tJLL5VSJk6c+GZvEQDsgO0WwKc+9alHH320lNKlS5exY8fWT5500knbHPyOd7yjXpgxY8aqVatOPvnkzZs3z5s3b4thjUbjpJNOuuGGGz72sY+V134XaOuhhx7q27fvTn2RN81ll112wgknvPDCC2/2hgDADtjukYCbNm1qbW19/vnnBwwYUDpxPGDXrl3333////mf/6kfvve97/3hD384fvz4ttcVnjZt2t/8zd80Hw4ePPjZZ59tPtx///2XL1/uDoEA8AZo75qAQ4YMWbZsWT3ge9/73oc//OFSyv777//zn/9868ETJkx44IEHzjnnnIMOOujCCy9csGDBhAkTnn766aFDhzbHLF68+Kmnnvra1762acOGny1dWu9j+P9NaTT22Weftk2wm1iwYMGiRYu6du36gQ98YOTIkW/25gDALtDeNfjq3+n/8i//spTyoQ99aPTo0aWUZcuW1ZcK2MKCBQu6d+9+/fXXP/HEE+PGvXfBgn9fu/bFXr16NQc88MCC8e973+LFi4855pibv/nNb37zm23fXu9jWLJkyTa3pPGan/zkJ+1/n2nTpjU6Z926de2vauDAgfXIiRMnnnXWWaeffvrBBx9cPzNs2LAnnnii/bcDwO6sg/sC1BPz2rVr67l87733rs/g39676vsCzJw5c8aMGedNm9bS2lpfVODwww8fPnz4jTfeeOyxx959991b3F/4lVde6d69e69evdauXbv1OpcuXdo8qHDvvfduHpm4Teedd17bHxra18537/DY/k996lO33357Jz8IAHY3HVyH/5xzziml9O7du364cuXKAw88sGx/glyxYsXYsWNnzJhRShk2YsTs2bOrqqqq6sEHHzzjjDNKKX/6p3+6xfR/7733du/evZSyzem/lNL2nIKVK1d2+qt1bJt7Aq699tq2327gwIF33HHHkiVLnn322Y0bN1avMf0D8JbWQQFcd9119UJzUnzyySevvfba+pmtDwjYe++9H3vssenTp++xxx5HH310213lixcvbjQa++67b9vp/+mnn/6t3/qtUsoBBxywzQ340Ic+VC80zxGYOnVqZ75Y1a4FCxbUw/r06dP2XStXrjz//PPr5ZkzZ1ZVtXLlyt/+7d8eMWLEPvvs06VLl858NADs/jr4FaCU8uyzz+6777718re+9a2jjz66Xj7ttNNuuummyZMnf/vb397mG59//vm77rrrn//5nwcMGHD44Ydvfa3Af/3Xfz3qqKPq5XZ+VmgOaC6vXr26X79+2xzf/BWgw++1zbMbmk/+93//d33hQgB4e2r/b+XaZZdd1hz/0ksvNZ+fO3du51eyhenTpzfXedFFF21zTHMfw6BBg6qq+sM//MP64ahRo7a32nPPPbeTm7T1/8CGDRt26L8FAN66Ot4HUNtvv/2eeeaZevmII464995727761a9+9fd///cvueSSL3/5y51ZW9sf2hcuXFifZdDOsOZGdnhZgtezD2Do0KFPP/10KWX9+vV77rlnJ74HALxVdXAcQNPy5cubxwPed999jUaj7QF6Z511VlVVHU7/zzzzTH02XfOZe+65Z3vT/zY1B1966aWdf9cWZs6c2dyGtpcfqKf/UaNGmf4BeNvrbAGUUl588cXnnnuu+XDp0qX1dP6Rj3xke4fx1x5++OGPfvSjjUZjv/32a/v8smXLpkyZsr131ScI1J/bfLJ5KYIvfelL7W9tO1cC+MIXvlCPqapqn332qZcXL15cL1x00UXtrxkA3gZad2j0oEGDbrnlli3u/vfd7363vi/A0KFDP/nJT44aNapHjx4rVqx4+OGHv//979c3A9xah3vpX3nllVJK3759m/sedrkBAwasWrWqXm5GTPOwRwB4G9uxAiilnHTSSSeddFK3bt1effXVLV566qmnZs+e3eEazj333Pp8wnZ8/etfrxfWrFmzvWsP9OrVq74v3zadeOKJ24uM+++/v76u0erVq5sXJxg0aFD96ve///0jjzyyoy8BAG9tnT0ScJsuvvjiWbNmdX78Y4899p73vKczIzu8JF/tb//2b88+++y2z3T+SMDjjz++vqrPjTfe+OlPf7r5oS0tLZs2berMpwPAW9cOHAewta985StVVf393/99+8OGDx/+ta99raqqTk7/n/3sZzu5AX/wB3/QyZFbu+222+qFL37xi/VC//79SymbN29+6qmndnq1APCW8Lr2AfyadHjKXztjOr8PoLmS7t27v/zyy6WU9evX77XXXh1+NAC8DbyufQC/DjfffHO90LwM8DY1Lyi0//7779wHNY8hGDNmTL3QrVu35qud/BkCAN6idrsCOPXUU+uFX/ziF+0M+6u/+qt6Yfny5TvxKXPnzm2eYnD//fc3n69+9QrBO3StAgB4C9nhcwHeGK2tHW/YuHHjHn300VLKQw89dPjhh2/xauf/iO/atWvbh9/97nfrmxWVUv7rv/6r0WiMHz9+0qRJI0aM6Nev37Bhw8aPH9/JNQPAbmv3Og5gyJAhy5YtO+qoo+bNm9eZ8VdeeWV9AZ/mt2geB9AZH//4x5u3NtjCoEGD2r8T8ejRo5uXJwKAt5zd6FeAr371q8uWLXvkkUc6Of2XUv7oj/6oPoivviRRKaXRaOzZru7du0+YMGH27NlVmzsbbW3FihVVVW3z8gYtLS1/93d/Z/oH4C1t99oHAAC8MXajfQAAwBtGAQBAot2oAJo3HGoexv/AAw+UUvr27Vvf068+8r95i7/m4Eaj0dLS0va9d999d3O1zZH33ntvPbi+9l/zwgObNm1qNBo9e/asHy5ZsmTUqFGllOYz5VfPLNj6vAMAeMvZjQqgOYvXU3557ZzANWvW1Lf5GTduXCnlxz/+cVVVzcMXZs2aVVXV5s2b64f9+vV76KGH2p5M+K1vfWvatGmllEmTJlVVNXXq1NWrV7f93NbW1qqq/vd//7d5X4DBgweXUvbcc896wI9//OMrrrhi48aNW2wnALx17Y6T2Zo1a6qq+vKXv9x85pe//GVz+eGHH653BtTuueeemTNnHnbYYfXDdevWPfnkk/Vf+aWUiRMnTpky5frrr9/mqmojR46sFwYOHFgvHHfccb169WoWwKGHHvr5z39+i8sGAMBb2m5UAPV5fU2/+7u/27xHX9uXzjnnnEmTJjV30Y8fP37GjBnN+/muX79+6tSpxx13XP3wuOOOq3cY3HHHHVusasOGDfXCvffeO2TIkEajsWjRolLKpk2bNmzY8NJLLz377LOllBdeeKFew5IlS+rxDz74YO/evbt3776Lvz8AvIGcDQgAiXajfQAAwBtGAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACTqoABmzpzZvXv3vfba65hjjjnppJPOO++8j33sY21vk7O1RqNx9NFHb++lbT7/uc99rvGrOrn17WxD24df+cpXtlj/qlWrOlzJyJEjm1cXBoC3mdbtvXD88cfffvvtp5xyyrp16x5//PHmhffbN3r06FtuueWee+7Z+qVGo9GlS5dtPl/fs6f5zLBhw44++uhvf/vbnfnErfXs2fPyyy9vu/4DDjig7fqPP/74ESNGrF27tp2VrFu3rr7FwM5tAwDs5rZ7VeBG4/9farvcvhNOOGHgwIFt78RTW7Ro0YIFC1599dVzzz13i5c2bNjQtWvX5kdMmDChe/fuc+fObd6YZ0e1trY27+NXSpk3b97kyZNbWloef/zxQw455JJLLlmwYME111wzduzYdlbSaDRefPHF3r1779w2AMBubrv7AKqquu+++4444ohDDz20lDJ58uSFCxc+99xz7axr/vz5d95558aNGwcMGLDFbvZ3v/vdo0ePXrhw4dbvqu+595u/+ZullEceeeSxxx676aabdnr6v+KKKyZOnNj2mcmTJ5dShg0bdsghh6xdu/aKK67ocPqvmf4BeDurtm/p0qXNYePHj3/44Yerqrr00kvrP9YfeeSReuH973//oEGD6uWHH374qKOOar40cuTIH/7wh4ceeujYsWNvu+228847b5sf9NGPfvTVV18tpZxxxhkvv/xy/WQp5a677qoX6n/nz59/+umnl1L69+9fVVWPHj3qW/02x7/rXe/a5je69tpr//3f/71bt27jxo370Y9+1BxfD37xxRePPPLIXr169ejRY8CAAaWUz3zmM7NmzRo/fnw94JVXXimlXHDBBa2trc07Crbz/wYAu7+OZ7I+ffr8yhtKOeCAA+opcNiwYd/73vc+85nPjBs37swzz/zIRz5S38+3qqpu3botW7as+ZYf/ehHf/zHf/yFL3zhggsuuPDCC9uusLlf4d3vfveIESOaMfHOd77zqquuOvDAA1tbW88+++x6tV26dPn4xz/eaDTGjBlTSmltba2fHzdu3HXXXdevX7+ePXtu40uWUkoZMmTIIYccUo/v27dvVVWNRmP27Nmtra3vf//765EHH3xwXRULFy7s3bv32LFjV6xYUUrp0qXL3Llzq9dyBADe6jqYz/bYY4+nn366+XDKlCm9evWqqqqOgNqUKVOmT5/ev3////zP/7zggguuvPLKepqcN29evfC+971vjz32+Ld/+7dSyuWXX77lFpQyf/78qqrWrVtXVdXgwYPvvPPObt26VVV14IEHllL69et31llnHX300bfeeuv69esbjcZPfvKTz3/+80cccUT99ne84x2llOuuu66UMmfOnK3XP3369Kqq1qxZU1XVaaedVu9v+L3f+7277rprzZo1zUl90aJF06dPb2lpKaUcdthhVVUtXrz41FNPLaWsWLGiucLzzz//gQce2NH/aADYrXRQAG3/5B06dOi//Mu/TJgwoaqqRqMxbdq0W2+99ZZbbjnqqKOWL19e//E9YsSIY445ZtasWStXrqzn73qvwNq1a+fMmTNq1Khtfsqf//mff+lLX6qqqj4+v/7cSZMm/fSnPy2lnHLKKVOnTv3pT396zz33jB49+pprrqmqqmvXrrfffns98tprr50/f36fPn1KKT/72c+2Xv/VV199zjnnNL/R5s2b+/bt+4EPfGDr71hK+exnP1tKWb16dSnlzDPPbDvgz/7sz5YvX15KWbx4ccf/tQCwG+vgIP/6EP1jjz22uQ98e2O2Pl+gfrKdlZdSvv71rw8cOPCYY455/PHHR40a1b9//22eqd+nT58XXnih/VWVUg477LCbb7657YmLTz311De+8Y1LL7102bJlQ4YMKa/lRTuqqmppadnesPrMhQ63BAB2cx1fE3DChAknnnhifTRcre3s2NLSMmXKlPrJev9/U2cu7HPaaafVlxj6xje+UVXVFtN/fWWhJ5544pRTTulwVaWUra9bMHTo0Msuu6zRaMyYMaNOng5X0v6pj6Z/AN4eOtgH8E//9E+9e/euT6jb2tKlS4cPH/7SSy/17Nlzl2/Zpk2b1q9f36NHj0aj8fLLL3fv3n2XfwQAxOpgH8CJJ564zen/Bz/4wYABA4YPH15V1a9j+i+lfPCDH6yn/zPOOMP0DwC7Vmcv9vfG27Rp0x577DFt2rRrrrnmzd4WAHi72X0LAAD49XF3YABIpAAAIJECAIBECgAAEikAAEikAAAgkQIAgEQKAAASKQAASKQAACCRAgCARAoAABIpAABIpAAAIJECAIBECgAAEikAAEikAAAgkQIAAACAEFVVvdmbAAC80fwKAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAAAGRouB4AAATyKwAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQAo9wZQAAASfSURBVCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJCo9U351Eaj8aZ8LgDszqqqesM+q/FGfhgAsJvwKwAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAkEgBAEAiBQAAiRQAACRSAACQSAEAQCIFAACJFAAAJFIAAJBIAQBAIgUAAIkUAAAkUgAAAAAQoqqqN3sTAIA3ml8BACCRAgCARAoAABIpAABIpAAAIJECAAAAgAz/B8e4I8a7EUjyAAAAAElFTkSuQmCC" id="p1img1"></DIV>


<DIV class="dclr"></DIV>
<DIV id="id1_1">
<P class="p0 ft0">ABC International - South Africa</P>
</DIV>
<DIV id="id1_2">
<DIV id="id1_2_1">
<P class="p1 ft1">KBW House, 122 De Korte Street, Braamfontein, Johannesburg South Africa</P>
<P class="p2 ft2">Telephone: +27 11 403 2171 | 011 4032171</P>
<P class="p2 ft2">Email: info@abcinternational.co.za</P>
<P class="p2 ft2">Web: www.abcinternational.co.za</P>
</DIV>
<DIV id="id1_2_2">
<P class="p3 ft3">PROGRESS REPORT Exam</P>
</DIV>
</DIV>
<DIV id="id1_3">
<TABLE cellpadding=0 cellspacing=0 class="t0">
<TR>
	<TD colspan=3 class="tr0 td0"><P class="p4 ft5"><SPAN class="ft4">Student Name : </SPAN><?php echo $student_row["student_name"]; ?></P></TD>
	<TD class="tr0 td1"><P class="p4 ft6">&nbsp;</P></TD>
	<TD class="tr0 td2"><P class="p4 ft6">&nbsp;</P></TD>
</TR>
<TR>
	<TD colspan=2 class="tr1 td3"><P class="p4 ft5"><SPAN class="ft4">Student ID : </SPAN><NOBR><?php echo $student_row["student_id"]; ?></NOBR></P></TD>
	<TD colspan=2 class="tr1 td4"><P class="p4 ft4">Date of Birth : <SPAN class="ft5"><?php echo $student_row["dob"]; ?></SPAN></P></TD>
	<TD class="tr1 td2"><P class="p5 ft4">Passport No : <SPAN class="ft5"><?php echo $student_row["passport_no"]; ?></SPAN></P></TD>
</TR>
<TR>
	<TD class="tr2 td5"><P class="p4 ft4">Course Name :</P></TD>
	<TD class="tr2 td6"><P class="p4 ft5"><?php echo $course_row["course_name"]; ?></P></TD>
	<TD class="tr2 td7"><P class="p4 ft6">&nbsp;</P></TD>
	<TD colspan=2 class="tr2 td8"><P class="p6 ft8"><SPAN class="ft7">Instructor(s) : </SPAN><?php echo $instructor_row["name"]; ?></P></TD>
</TR>
<TR>
	<TD class="tr1"><P class="p4 ft4">Course Session :</P></TD>
	<TD colspan=2 class="tr1"><P class="p4 ft5"><?php echo $row["month"]; ?> - <?=$year?></P></TD>
    <TD colspan=2 class="tr2 "><P class="p6 ft8" style="text-align: left"><SPAN class="ft7">Number of days Absent: </SPAN><?php echo $row["attendance"]; ?></P></TD>
</TR>
<TR>
    <TD colspan=2 class="tr2 "><P class="p6 ft8" style="text-align: initial !important;"><SPAN class="ft7">Rewrite Date: </SPAN><?php echo $row["rewrite_date"]; ?></P></TD>
</TR>
</TABLE>
<TABLE cellpadding=0 cellspacing=0 class="t1">
<TR>
	<TD colspan=2 class="tr3 td10"><P class="p7 ft9">Name of Subject</P></TD>
	<TD class="tr3 td11"><P class="p8 ft9">Percentage<SPAN class="ft10">..</SPAN></P></TD>
</TR>
<TR>
	<TD class="tr4 td12"><P class="p4 ft11">&nbsp;</P></TD>
	<TD class="tr4 td13"><P class="p4 ft11">&nbsp;</P></TD>
	<TD class="tr4 td14"><P class="p4 ft11">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub1"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">1.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Grammar</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub1"]; ?>% </P></TD>
	<?php if($row["sub1"]<65){ ?>  <TD class="" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub2"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">2.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Vocabulary</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub2"]; ?>% </P></TD>
    <?php if($row["sub2"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub3"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">3.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Comprehension</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub3"]; ?>% </P></TD>
    <?php if($row["sub3"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub4"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">4.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Composition</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub4"]; ?>% </P></TD>
    <?php if($row["sub4"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub5"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">5.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Pronunciation</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub5"]; ?>% </P></TD>
    <?php if($row["sub5"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub6"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">6.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Prepared Speaking</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub6"]; ?>% </P></TD>
    <?php if($row["sub6"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub7"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">7.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Unprepared Speaking</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub7"]; ?>% </P></TD>
    <?php if($row["sub7"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub8"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">8.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Reading</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub8"]; ?>% </P></TD>
    <?php if($row["sub8"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub9"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">9.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Dictation</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub9"]; ?>% </P></TD>
    <?php if($row["sub9"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub10"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD class="tr5 td15"><P class="p9 ft12">10.</P></TD>
	<TD class="tr5 td16"><P class="p10 ft12">Active Listening</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub10"]; ?>% </P></TD>
    <?php if($row["sub10"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD colspan=2 class="tr6 td21"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
<TR <?php if($row["sub11"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD colspan=2 class="tr5 td22"><P class="p9 ft12">11. Online Grammar</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub11"]; ?>% </P></TD>
    <?php if($row["sub11"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR <?php if($row["sub12"]<65){?>  style="background-color: #ff00005e;" <?php } ?>>
	<TD colspan=2 class="tr5 td22"><P class="p9 ft12">12. Number OF Compositions</P></TD>
	<TD class="tr5 td17"><P class="p11 ft12"><?php echo $row["sub12"]; ?>% </P></TD>
    <?php if($row["sub12"]<65){ ?>  <TD class="tr5 td17" style="background: white; border: none;font-weight: bold;color: red;">( Re-Write )</TD> <?php } ?>
</TR>
<TR>
	<TD class="tr6 td18"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td19"><P class="p4 ft14">&nbsp;</P></TD>
	<TD class="tr6 td20"><P class="p4 ft14">&nbsp;</P></TD>
</TR>
</TABLE>
<P class="p12 ft15">Comments: </P>
<P class="p13 ft16">ABC International (PTY) Ltd</P>
<TABLE cellpadding=0 cellspacing=0 class="t2">
<TR>
	<TD class="tr7 td23"><P class="p4 ft18">Registration Number : <SPAN class="ft17">2018/506135/07</SPAN></P></TD>
	<TD class="tr7 td24"><P class="p4 ft18">Accreditation No : <SPAN class="ft17">ETDP10758</SPAN></P></TD>
	<TD class="tr7 td25"><P class="p4 ft18">IEB Centre : <SPAN class="ft17">9584</SPAN></P></TD>
</TR>
</TABLE>
    <img src="img/stamp.png" alt="" style="height: 135px; margin-left: 450px; margin-top: -121px;">
</DIV>
</DIV>
</BODY>
</HTML>
