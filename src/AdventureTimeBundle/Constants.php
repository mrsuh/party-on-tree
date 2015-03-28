<?php

namespace AdventureTimeBundle;


class Constants
{


    //roles
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    //return
    const OK = 1;
    const ERROR = 2;
    const USER_NOT_EXIST = 3;
    const USER_EXIST = 4;
    const INVALID_CODE = 5;

    //name for check_login
    const WSSE_NAME = 'wsse_username';
    const WSSE_PASS = 'wsse_password';

    const PASSWORD_LENGTH = 8;

    //пол персонажей
    const SEX_MALE = 'male';
    const SEX_FEMALE = 'female';

}