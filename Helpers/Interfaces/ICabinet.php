<?php 
    namespace App\Helpers\Interfaces;

    interface ICabinet 
    {
        /**
         * Parametre olarak verilen rafın kapasitesini döndürür
         * @param string $roof
         */
        public function getRoofCapacity(string $roof) :int;
        /**
         * Parametre olarak verilen rafa bir kutu içecek ekler
         * @param string $roof
         */
        public function add(string $roof);
        /**
         * Parametre olarak verilen raftan bir kutu içecek alır
         * @param string $roof
         */
        public function take(string $roof);
        /**
         * Dolabın mevcut kapak durumunu verir. Örn: Açık/Kapalı
         */
        public function doorStatus();
        /**
         * Boş dolap sayılarını verir
         * @return int
         */
        public function emptyRoofCount() : int;
        /**
         * Dolu dolap sayılarını verir
         * @return int
         */
        public function fullRoofCount() : int;

        /**
         * Dolabın doluluk oranını verir. Örn: Tamamen Dolu/Kısmen Dolu/Tamamen Boş
         */
        public function cabinetStatus();
    }
    
?>