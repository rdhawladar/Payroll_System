<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('generate_options'))
{
 function generate_options($from,$to,$callback=false)
 {
  $reverse=false;
  if($from>$to)
  {
   $tmp=$from;
   $from=$to;
   $to=$tmp;
   $reverse=true;
  }
  $return_string=array();
  for($i=$from;$i<=$to;$i++)
  {
   $return_string[]='
   <option value="'.$i.'">'.($callback?$callback($i):$i).'</option>
   ';
  }
  if($reverse)
  {
   $return_string=array_reverse($return_string);
  }
  return join('',$return_string);
 }
}
if ( ! function_exists('callback_month'))
{
 function callback_month($month)
 {
  return date('F',mktime(0,0,0,$month,1));
 }
}
if ( ! function_exists('format_date'))
{
 function format_date($date)
 {
  $parts = explode('-',$date);
  return date('F j, Y',mktime(0,0,0,$parts[1],$parts[2],$parts[0]));
 }
}
?>