INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('marilyn', '', 'monroe', 'marilyn@gmail.com', 1092565390, 'CUST1marilyn.jpg', 'usa');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('abraham', '', 'lincoln', 'abraham@gmail.com', 1092526755, 'CUST2abraham.jpg', 'usa');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('nelson', '', 'mandela', 'nelson@gmail.com', 1098266520, 'CUST3nelson.jpg', 'africa');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('martin', 'luther', 'king', 'martin@gmail.com', 1092555390, 'CUST4martin.jpg', 'usa');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('christopher', '', 'columbus', 'christopher@gmail.com', 1232343012, 'CUST5christopher.jpg', 'italy');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('albert', '', 'einstein', 'albert@gmail.com', 1092500000, 'CUST6albert.jpg', 'germany');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('mahatma', '', 'gandhi', 'mahatma@gmail.com', 1123009863, 'CUST7mahatma.jpg', 'india');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('malala', '', 'yousafazi', 'malala@gmail.com', 109212101, 'CUST8malala.jpg', 'pakistan');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('charles', '', 'darwin', 'charles@gmail.com', 1092565399, 'CUST9charles.jpg', 'uk');
INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS) VALUES('cristiano', '', 'ronaldo', 'cristiano@gmail.com', 1092565369, 'CUST10cristiano.jpg', 'portugal');


INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('marilyn', '583464e8915993dfeee82d988f72c379', 'CUST1');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('abraham', '583464e8915993dfeee82d988f72c379', 'CUST2');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('nelson', '583464e8915993dfeee82d988f72c379', 'CUST3');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('martin', '583464e8915993dfeee82d988f72c379', 'CUST4');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('christopher', '583464e8915993dfeee82d988f72c379', 'CUST5');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('albert', '583464e8915993dfeee82d988f72c379', 'CUST6');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('mahatma', '583464e8915993dfeee82d988f72c379', 'CUST7');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('malala', '583464e8915993dfeee82d988f72c379', 'CUST8');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('charles', '583464e8915993dfeee82d988f72c379', 'CUST9');
INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES('cristiano', '583464e8915993dfeee82d988f72c379', 'CUST10');


INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST1');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST2');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST3');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST4');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST5');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST6');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST7');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST8');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST9');
INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES('CUST10');


INSERT INTO ADMIN(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER) VALUES('joseph', 'martin', 'sanchez', 'joseph@gmail.com', 1090908869);

INSERT INTO ADMIN_CREDENTIAL(ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_ID_FK) VALUES('jospeh', '583464e8915993dfeee82d988f72c379', 'ADMIN1');


INSERT INTO TRADER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, TRADER_ADDRESS, SHOP1, SHOP2, IMAGES, TRADER_TYPE, ADMIN_ID_FK) VALUES('tom', '', 'cruise', 'tom@gmail.com', 9810267526, 'usa', 'fresh chicken shop', 'pork shop', 'TRD1tom.jpg', 'bucher shop', 'ADMIN1');
INSERT INTO TRADER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, TRADER_ADDRESS, SHOP1, SHOP2, IMAGES, TRADER_TYPE, ADMIN_ID_FK) VALUES('tim', 'berners', 'lee', 'tim@gmail.com', 9810267525, 'usa', 'fruits shop', 'vegetables shop', 'TRD2tim.jpg', 'greengrocer shop', 'ADMIN1');
INSERT INTO TRADER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, TRADER_ADDRESS, SHOP1, SHOP2, IMAGES, TRADER_TYPE, ADMIN_ID_FK) VALUES('sacha', 'baron', 'cohen', 'sacha@gmail.com', 9810267527, 'usa', 'milk shop', 'cake shop', 'TRD3sacha.jpg', 'bakery shop', 'ADMIN1');
INSERT INTO TRADER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, TRADER_ADDRESS, SHOP1, SHOP2, IMAGES, TRADER_TYPE, ADMIN_ID_FK) VALUES('kylie', '', 'minogue', 'kylie@gmail.com', 9810267528, 'australia', 'pizza shop', 'moMm shop', 'TRD4kylie.jpg', 'delicatessen store', 'ADMIN1');
INSERT INTO TRADER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, TRADER_ADDRESS, SHOP1, SHOP2, IMAGES, TRADER_TYPE, ADMIN_ID_FK) VALUES('stephen', '', 'king', 'stephen@gmail.com', 9810267529, 'usa', 'salmon shop', 'fresh halibut', 'TRD5stephen.jpg', 'fishmonger shop', 'ADMIN1');


INSERT INTO TRADER_CREDENTIAL(TRADER_USERNAME, TRADER_PASSWORD, TRADER_ID_FK) VALUES('tom', '583464e8915993dfeee82d988f72c379', 'TRD1');
INSERT INTO TRADER_CREDENTIAL(TRADER_USERNAME, TRADER_PASSWORD, TRADER_ID_FK) VALUES('tim', '583464e8915993dfeee82d988f72c379', 'TRD2');
INSERT INTO TRADER_CREDENTIAL(TRADER_USERNAME, TRADER_PASSWORD, TRADER_ID_FK) VALUES('sacha', '583464e8915993dfeee82d988f72c379', 'TRD3');
INSERT INTO TRADER_CREDENTIAL(TRADER_USERNAME, TRADER_PASSWORD, TRADER_ID_FK) VALUES('kylie', '583464e8915993dfeee82d988f72c379', 'TRD4');
INSERT INTO TRADER_CREDENTIAL(TRADER_USERNAME, TRADER_PASSWORD, TRADER_ID_FK) VALUES('stephen', '583464e8915993dfeee82d988f72c379', 'TRD5');


INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('fresh chicken shop', 'bucher shop', 'TRD1');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('pork shop', 'bucher shop', 'TRD1');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('fruits shop', 'greengrocer shop', 'TRD2');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('vegetables shop', 'greengrocer shop', 'TRD2');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('milk shop', 'bakery shop', 'TRD3');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('cake shop', 'bakery shop', 'TRD3');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('pizza shop', 'delicatessen store', 'TRD4');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('momo shop', 'delicatessen store', 'TRD4');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('salmon shop', 'fishmonger shop', 'TRD5');
INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES('fresh halibut', 'fishmonger shop', 'TRD5');


INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('chicken wings', 'fresh chicken wings', 'meat', 4, 50, 1, 'none', 20, 1, 'PROD1chicken wings.jpg', 'SHOP1', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('chicken breasts', 'fresh chicken breasts', 'meat', 6, 60, 1, 'none', 20, 1, 'PROD2chicken breasts.jpg', 'SHOP1', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('whole chicken', 'fresh chicken', 'meat', 15, 20, 1, 'none', 20, 1, 'PROD3whole chicken.jpg', 'SHOP1', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('chicken liver', 'fresh chicken liver', 'meat', 10, 35, 1, 'none', 20, 1, 'PROD4chicken liver.jpg', 'SHOP1', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('fresh pork', 'fresh pork', 'meat', 15, 12, 1, 'none', 20, 1, 'PROD5fresh pork.jpg', 'SHOP2', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('apples', 'organic apples', 'fruits', 2, 90, 1, 'none', 20, 1, 'PROD6apples.jpg', 'SHOP3', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('oranges', 'organic oranges', 'fruits', 2, 90, 1, 'none', 20, 1, 'PROD7oranges.jpg', 'SHOP3', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('grapes', 'organic grapes', 'fruits', 4, 70, 1, 'none', 20, 1, 'PROD8grapes.jpg', 'SHOP3', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('bananas', 'organic bananas', 'fruits', 3, 70, 1, 'none', 20, 1, 'PROD9bananas.jpg', 'SHOP3', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('tomatoes', 'organic tomatoes', 'vegetables', 4, 100, 1, 'none', 20, 1, 'PROD10tomatoes.jpg', 'SHOP4', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('cauliflower', 'organic cauliflower', 'vegetables', 7, 45, 1, 'none', 20, 1, 'PROD11cauliflower.jpg', 'SHOP4', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('peas', 'organic peas', 'vegetables', 4, 40, 1, 'none', 20, 1, 'PROD12peas.jpg', 'SHOP4', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('cow milk', 'fresh cow milk', 'dairy', 7, 30, 1, 'none', 20, 1, 'PROD13cow milk.jpg', 'SHOP5', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('buffalo milk', 'fresh buffalo milk', 'dairy', 7, 30, 1, 'none', 20, 1, 'PROD14buffalo milk.jpg', 'SHOP5', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('strawberry cake', 'strawberry flavored cake', 'cake', 20, 10, 1, 'none', 20, 1, 'PROD15strawberry cake.jpg', 'SHOP6', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('chocolate cake', 'chocolate flavored cake', 'cake', 15, 10, 1, 'none', 20, 1, 'PROD16chocolate cake.jpg', 'SHOP6', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('Vveg pizza', 'pizza for veg', 'fast food', 20, 20, 1, 'none', 20, 1, 'PROD17veg pizza.jpg', 'SHOP7', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('non-veg pizza', 'pizza for non-veg', 'fast food', 25, 40, 1, 'none', 20, 1, 'PROD18non-veg pizza.jpg', 'SHOP7', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('veg momo', 'momo for veg', 'fast food', 5, 40, 1, 'none', 20, 1, 'PROD19veg momo.jpg', 'SHOP8', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('non-veg momo', 'momo for non-veg', 'fast food', 8, 50, 1, 'none', 20, 1, 'PROD20non-veg momo.jpg', 'SHOP8', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('salmon', 'fresh salmon', 'seafood', 15, 50, 1, 'none', 20, 1, 'PROD21salmon.jpg', 'SHOP9', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('halibut', 'fresh halibut', 'seafood', 35, 90, 1, 'none', 20, 1, 'PROD22halibut.jpg', 'SHOP10', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('croissant', 'freshly baked tasty croissant', 'cake', 2, 20, 1, 'none', 6, 1, 'PROD23croissant.jpg', 'SHOP6', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('tomme cheese', 'Best Test', 'dairy', 3, 20, 1, 'none', 3, 1, 'PROD24tomme.jpg', 'SHOP5', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('gorgonzola cheese', 'Flavoured', 'dairy', 4, 10, 1, 'none', 2, 1, 'PROD25gorgonzola.jpg', 'SHOP5', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('Round Cereals', 'Meal for childern', 'cereals', 3, 15, 1, 'none', 2, 1, 'PROD27cereal.jpg', 'SHOP7', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('Strawberry flakes', 'Healthy meal', 'cereals', 3, 15, 1, 'none', 2, 1, 'PROD28cereal2.jpg', 'SHOP8', '');
INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK, OFFER_ID_FK) VALUES('Oats', 'A healthy breakfast', 'cereals', 3, 15, 1, 'none', 2, 1, 'PROD29cereal3.jpg', 'SHOP7', '');