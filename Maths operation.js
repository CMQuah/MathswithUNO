function operations(number1, operator , number2)
{
    switch($operator)
    {

        case '+':
            value = number1 + number2;
            break;

            case '-':
            value = number1 - number2;
            break;

            case 'x':
            value = number1 * number2;
            break;

            case '/':
            value = number1 / number2;
            break;

    }
    return value;
}


