<?php
/**
 * 冒泡排序
 * 
 * @author  langrun@baidu.com
 * @date 2019/11/14
 * @desc
 * 由底至上的把较少的气泡逐步地向上升，这样经过遍历一次后最小的气泡就会被上升到顶（下标为0
 * 可以这么理解，两两比较，较小的往上压
 * 
 * 大O表示： O(n 2)
 */

 /**
 * BubbleSort
 * params array $container
 * return array
  */
 function BubbleSort(array $container)
 {
     $count = count($container);

     # 不需要排序直接返回
     if($count <= 1) {
         return $container;
     }

     for($i = 1;$i < $count; $i++)
     {
         for($j = 0; $j < $count - $i; $j++)
         {
             if($container[$j] > $container[$j+1]) {
                 $temp = $container[$j];
                 $container[$j] = $container[$j+1];
                 $container[$j+1] = $temp;
             }
         }
     } 
     return $container;
 }

 var_dump(BubbleSort([4, 21, 41, 2, 53, 1, 213, 31, 21, 423]));
?>