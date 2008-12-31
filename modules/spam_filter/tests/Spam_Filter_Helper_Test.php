<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2008 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class Spam_Filter_Helper_Test extends Unit_Test_Case {
  public function get_driver_names_test() {
    $current_driver = module::get_var("spam_filter", "driver");
    foreach (glob(MODPATH . "spam_filter/libraries/drivers/*.php") as $file) {
      if (preg_match("#spam_filter/libraries/drivers/(.*).php$#", $file, $matches)) {
        if ($matches[1] != "Spam_Filter") {
          $expected[$matches[1]] = $matches[1] === $current_driver;
        }
      }
    }
    $this->assert_equal($expected, spam_filter::get_driver_names());
  }
}