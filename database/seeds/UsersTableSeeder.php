<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 3,
                'fullname' => 'Indra Gunanda',
                'username' => 'igun997',
                'password' => 'indra290997',
                'email' => 'indra.gunanda@gmail.com',
                'phone' => '081214267695',
                'level' => 1,
                'jk' => 0,
                'status' => 1,
                'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpZCI6MywibGV2ZWwiOjEsImV4cGlyZWQiOjE1OTQ1MDIxMzN9.RJ-L7HQCL_fdonJe7D4q5bUiIrJ7-Endv03ZnM26Zms8JzHoZfrD-sSTsBLBliau2AWqP3t5UqE7eKYYVn216ddwyyDdYjT1Du707zEbfFowUxOQf7goDsw5E369R9MLnO-NgfGWHTN_3DE0JA6ISNTpp8ofcICT5-xPe2QaEEHgJs9mDULt4Hcus-AvVQrDXXgt_ymhKtJhI0_reLpdtHrAsfDJknCuuADp99v6ZycTO5WPNalJKmv1bcc3LliWFkrHkhw-p9mT0J48sAHtu85xIfl64udej8oNfMPJVuDt0QizxqRlHImbdnhAdTTT4OjuofVzY_8a3NqIRIgPKxstxgTci-UO0vCnPiFjIkUJd566ZcHzthqkmbe0gMi__jmfiJQ5I6QESK5nVJoTqTVgRnOjQQiJw_AIPpCh4R6G0G6oqD5egxi1qvE2CY_gMicvbaSC0r7TyNPS2APYNCi9YkBM0tgvkricW-38Fl8eRuK_X72grc7UxKHjp0xcvrttMdhQvzwpeFrwe4vrxL90xX3Nz6Obih_Bl2jExW63s1iTeNcifIbrP70Ly8eucah9DEzE9ApeKMh_tjOW8cshihNzdhTWhxmw5EWMavXEkyzzbn00N6x97X48OAZQJVbq1Nx46gr2u66JxeJvagJfwC20zsRJzBBf6SWgC2I',
                'created_at' => '2020-07-10',
                'updated_at' => '2020-07-11',
            ),
            1 => 
            array (
                'id' => 4,
                'fullname' => 'Indra Gunanda',
                'username' => 'indra',
                'password' => 'indra',
                'email' => 'indra.gunanda@gmaila.com',
                'phone' => '081214267695',
                'level' => 0,
                'jk' => 0,
                'status' => 1,
                'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpZCI6NCwibGV2ZWwiOjAsImV4cGlyZWQiOjE1OTQ1MzAyODh9.a-bWnoB19wKrVlGcI0npwNCqEE1HWfbbu94yQb9BBiSyjCyodOEQOUDQF30-mvOpUhVlszEy_dbQgUnkX11tZron7cpA0XNs5J0YypEPH36cR-agVNau6PhMIaXYF3jNZxcDalAbOdk-hwIrmC2e42jsxsxHhizYE7LkZ4PfiSiw4tqE5DMlFwDKstp3r6W9q9lbVG83G0Hc9KKwJm-KFqpxxo_rsuolIU_-P91Z0EIU15ws7IIa9qzQ0H5UElppNV1Kaez0yZqL9Y4wU3YY-zs7FTOEz8o4IAquptRW0C5_Tr7wkOF-OIGMKROXEux9y0viY6PenU4EAZJh-Cgy-L8xOmLoRemLexMHG8E6vXc5zaX8zRuMY0fFsktEZg3xKpQZH0jjLtD7fLDrMAfMAoidcSxi2Dt0cvM5rX47MNkmHtcejCWb-IQkV2xZPj567nBxz3XymDdhxs8CaGguYGnneAKRoIAiaXt31wAWhT3e1YDzGgMi4_blxzHOdx7UjrUQjgZvc-RN9HPDL2RBy5VYuBusNiQCxQqMlnvMQ0zRxNrRNO2BK-YSNyTlOTlHjI5Yeaq2KcbivN-0kb2jbdvotsUoctHwk75x4H_5wopkErlg4vL6Dl_LvLD-NWzhIl-DssSz2Nv52DWrWUzisln6AIpotLLK-lylF9cICoY',
                'created_at' => '2020-07-12',
                'updated_at' => '2020-07-12',
            ),
        ));
        
        
    }
}