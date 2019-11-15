<?php
/**
 * 插入排序
 * 
 * @author  langrun@baidu.com
 * @date 2019/11/15
 * @desc
 * 思路分析：每步将一个待排序的纪录，按其关键码值的大小插入前面已经排序的文件中适当位置上，直到全部插入完为止
 * 算法适合少量数据的排序，时间负责度为 大O表示： O(n 2)
 */

 /**
  * InsertSort
  * @param array $container
  * @return array 
  */
  function InsertSort(array $container)
  {
      $count = count($container);
      if($count <= 1) {
          return $container;
      }

      for($i = 1; $i < $count;$i++)
      {
          $temp = $container[$i];
          $j = $i - 1;

          while($j >= 0 && $container[$j] > $temp){
              $container[$j+1] = $container[$j];
              $j--;
          }
          if($i != $j+1) {
              $container[$j+1] = $temp;
          }
      }
      return $container;
  }
  var_dump(InsertSort([3, 12, 42, 1, 24, 5, 346, 7]));
?>