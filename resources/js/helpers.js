// Форматируем ошибки ответа сервера в удобный вид
export const formatErrors = (errors, errorsNew) => {

  if(!errorsNew){
    return errors;
  }

  Object.keys(errors).forEach((item) => errors[item] = '');

  Object.keys(errorsNew).forEach((item) => {
    if(typeof errors[item] !== undefined){
      errors[item] = errorsNew[item];
    }
  });

  return errors;
}
