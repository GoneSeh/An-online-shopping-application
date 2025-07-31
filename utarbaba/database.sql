
CREATE DATABASE IF NOT EXISTS utarbaba_shopping COLLATE utf8mb4_general_ci;

USE utarbaba_shopping;

CREATE TABLE IF NOT EXISTS guests (
	guestId int(10) AUTO_INCREMENT, 
	name varchar(300),
	email varchar(300),
	password varchar(50),
    PRIMARY KEY (guestId)
);

INSERT INTO guests(name, email, password) VALUES (
    "Duke Chuah Erzhu",
    "duke123@gmail.com",
    "12345678"
);

CREATE TABLE IF NOT EXISTS items (
    itemId int(10) AUTO_INCREMENT,
    itemName varchar(300),
    itemDesc text,
    itemType varchar(20),
    itemPrice float(5,2),
    itemPhoto varchar(10),
    PRIMARY KEY (itemId)
);

(INSERT INTO items (itemName, itemDesc, itemType, itemPrice, itemPhoto) VALUES
("Fresh Red Apples", "Crisp and juicy red apples, perfect for snacking or baking.", "fruit", 3.99, "f4.jpg"),
("Sweet Bananas", "Naturally sweet bananas, packed with energy and potassium.", "fruit", 2.99, "f4.jpg"),
("Seedless Green Grapes", "Chilled, crunchy seedless green grapes great for refreshment.", "fruit", 5.49, "f3.jpg"),
("Ripe Mangoes", "Tropical ripe mangoes with rich flavor and smooth texture.", "fruit", 6.75, "f4.jpg"),
("Blueberries", "Fresh blueberries, ideal for smoothies, cereals, or snacking.", "fruit", 7.20, "f5.jpg");

INSERT INTO items (itemName, itemDesc, itemType, itemPrice, itemPhoto) VALUES
("Slim Fit Denim Pants", "Classic blue slim-fit jeans made from stretch denim for everyday comfort.", "pants", 29.99, "p1.webp"),
("Cargo Pants with Side Pockets", "Durable cargo pants featuring multiple utility pockets and adjustable waist.", "pants", 34.50, "p2.webp"),
("Chino Pants in Khaki", "Tailored khaki chinos that offer both casual style and smart appearance.", "pants", 27.80, "p3.webp"),
("Jogger Pants with Cuffs", "Athleisure joggers with elastic cuffs and drawstring waist for relaxed fit.", "pants", 24.90, "p4.webp"),
("Straight Cut Formal Pants", "Polished straight-leg formal pants, ideal for office or events.", "pants", 33.00, "p5.webp"),
("Tapered Fit Tech Pants", "Moisture-wicking tech pants with tapered fit and minimal design.", "pants", 31.75, "p6.webp"),
("Linen Blend Summer Pants", "Lightweight and breathable pants crafted with a soft linen blend.", "pants", 26.20, "p7.webp"),
("Cropped Pants with Pleats", "Trendy cropped pants with front pleats, offering a clean urban look.", "pants", 28.60, "p8.webp"),
("High Waist Wide-Leg Pants", "Stylish high-waisted pants with a relaxed wide-leg silhouette.", "pants", 35.90, "p9.webp"),
("Distressed Skinny Jeans", "Edgy skinny jeans with distressed detailing and faded wash.", "pants", 22.99, "p10.webp");

INSERT INTO items (itemName, itemDesc, itemType, itemPrice, itemPhoto) VALUES
("T-Shirt with Mountain Print", "Soft cotton t-shirt featuring a scenic mountain landscape, perfect for outdoor lovers.", "shirts", 22.99, "bg1.PNG.webp"),
("T-Shirt with Minimalist Line Art", "A sleek and stylish tee with abstract line art for a modern aesthetic.", "shirts", 19.50, "bg2.PNG.webp"),
("T-Shirt with Retro Sunset", "Vintage-style t-shirt featuring a faded retro sunset and palm trees.", "shirts", 24.90, "bg3.PNG.webp"),
("T-Shirt with Motivational Quote", "Comfortable t-shirt printed with an inspiring quote to keep you going.", "shirts", 16.99, "bg4.PNG.webp"),
("T-Shirt with Anime Eyes", "Trendy streetwear tee featuring bold anime-style eyes across the chest.", "shirts", 27.50, "bg5.PNG.webp"),
("T-Shirt with Pixel Art Design", "Classic fit t-shirt with nostalgic pixel art graphics for gamers.", "shirts", 18.25, "bg6.PNG.webp"),
("T-Shirt with Abstract Shapes", "Unique t-shirt covered in colorful abstract shapes and patterns.", "shirts", 21.80, "bg7.PNG.webp"),
("T-Shirt with Ocean Wave Print", "Relaxed fit shirt featuring a calming Japanese ocean wave print.", "shirts", 26.40, "bg8.PNG.webp"),
("T-Shirt with Vintage Car Graphic", "Soft washed tee with a retro car print, ideal for car enthusiasts.", "shirts", 14.99, "bg9.PNG.webp"),
("T-Shirt with Space Galaxy Design", "Eye-catching galaxy print t-shirt with stars and nebula tones.", "shirts", 29.50, "bg10.PNG.webp");



CREATE TABLE IF NOT EXISTS cart (
    guestId int(10),
    itemId int(10), 
    amount int(10),
    PRIMARY KEY (guestId, itemId),
    FOREIGN KEY (guestId) REFERENCES guests (guestId),
    FOREIGN KEY (itemId) REFERENCES items (itemId)
);

CREATE TABLE IF NOT EXISTS orders (
	orderId int(10) AUTO_INCREMENT,
	guestId int(10),
	tableNum varchar(100),
	paymentInfo varchar(100),
	PRIMARY KEY (orderId),
	FOREIGN KEY (guestId) REFERENCES guests (guestId)
);

CREATE TABLE IF NOT EXISTS order_item (
	orderId int(10),
	itemId int(10),
	amount int(10),
	PRIMARY KEY (orderId, itemId),
	FOREIGN KEY (orderId) REFERENCES orders (orderId),
	FOREIGN KEY (itemId) REFERENCES items (itemId)
);
