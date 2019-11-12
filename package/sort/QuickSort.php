<?php
/**
 * 快速排序
 *
 * @author  langrun@baidu.com
 * @date 2019/11/12
 * @desc
 * 从数列中挑一个元素，称为"基准"
 * 重新排序数列，所有元素比基准值大的在右边，小的在左边，
 * 递归将小于基准值的子数列和大于基准值的子数列排序
 *
 * 大O表示： O(n log n) 最糟 O(n 2)
 */

/**
 *QuickSort
 * params array $container
 * return array
 */
function QuickSort(array $container)
{
	$count = count($container);
	// 不需要排序直接返回
	if($count <=  1) {
		return $container;
	}

	$pivot = $container[0];
	$left = $right = [];

	for($i = 1; $i < $count; $i++)
	{
		if($container[$i] < $pivot) {
			$left[] = $container[$i];
		}
		else {
			$right[] = $container[$i];
		}
	}

	// 递归
	$left = QuickSort($left);
	$right = QuickSort($right);

	return array_merge($left, [$container[0]], $right);
}

var_dump(QuickSort([4, 21, 41, 2, 53, 1, 213, 31, 21, 423]));
?>
