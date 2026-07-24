import type { Metadata } from "next";
import { Poppins } from "next/font/google";
import Footer from "@/components/Footer";
import Header from "@/components/Header";
import "./globals.css";

const poppins = Poppins({
  variable: "--font-poppins",
  subsets: ["latin"],
  weight: ["300", "400", "500", "600", "700", "800"],
});

export const metadata: Metadata = {
  metadataBase: new URL("https://homerenovationae.com"),
  title: {
    default: "Home Renovation Dubai | Luxury Interior Décor — Home Renovation AE",
    template: "%s | Home Renovation AE",
  },
  description:
    "Home Renovation AE — Dubai's premium home décor, painting, flooring, furniture, curtains & office interiors. Free consultation. Call +971 56 288 9635",
  openGraph: {
    type: "website",
    locale: "en_AE",
    siteName: "Home Renovation AE",
    title: "Home Renovation Dubai | Luxury Interior Décor — Home Renovation AE",
    description:
      "Home Renovation AE — Dubai's premium home décor, painting, flooring, furniture, curtains & office interiors. Free consultation. Call +971 56 288 9635",
    images: ["/images/luxury-marble-tv-feature-wall-dubai.jpg"],
  },
  twitter: {
    card: "summary_large_image",
    title: "Home Renovation Dubai | Luxury Interior Décor — Home Renovation AE",
    description:
      "Home Renovation AE — Dubai's premium home décor, painting, flooring, furniture, curtains & office interiors. Free consultation. Call +971 56 288 9635",
    images: ["/images/luxury-marble-tv-feature-wall-dubai.jpg"],
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en-AE" className={`${poppins.variable} h-full antialiased`}>
      <body className="flex min-h-full flex-col font-sans">
        <Header />
        <main className="flex-1 pt-[78px]">{children}</main>
        <Footer />
      </body>
    </html>
  );
}
