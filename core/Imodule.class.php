<?php

/**
 *  Inteface of module
 * <p>History</p>
 * <ul>
 *   <li>add history and version</li>
 * </ul>
 * @author mohsen.Ahmadian :)
 * @version 1.1.10 2015/3/25
 */
interface Imodule {
    
    public function modPrint();
    public function HeadPrint();
    public function footerPrint();
    public function rightMenu();
    public function beadcrumbs();
    public function topMenu();   
    public function plugin();
}
