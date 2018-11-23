<?php
/**
 *
 *  * Copyright (C) $year Caspar Brenneisen
 *  *
 *  * This file is part of Qitsune
 *  *
 *  * Qitsune is free software: you can redistribute it and/or modify
 *  * it under the terms of the GNU Affero General Public License as published by
 *  * the Free Software Foundation, either version 3 of the License, or
 *  * (at your option) any later version.
 *  *
 *  * Qitsune is distributed in the hope that it will be useful,
 *  * but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  * GNU Affero General Public License for more details.
 *  *
 *  * You should have received a copy of the GNU Affero General Public License
 *  * along with Qitsune.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

	/**
	 * Created by PhpStorm.
	 * User: caspa
	 * Date: 23.11.2018
	 * Time: 22:20
	 */

	namespace App\helper;


	class helper
	{
		public static function br2nl($str){
			return str_replace("<br />", "\n", $str);
		}
	}
