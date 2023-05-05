using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using NUnit.Framework.Internal;

namespace SeleniumTest
{
    internal class ProductsWithoutLogin
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/productsonly";
        private IWebDriver webDriver { get; set; }
        private WebDriverWait wait { get; set; }

        [SetUp]
        public void Setup()
        {
            webDriver = new ChromeDriver();
            wait = new WebDriverWait(webDriver, TimeSpan.FromSeconds(20));
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromSeconds(60);
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
        }

        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }

        [Test]
        public void MinMaxFilter()
        {
            string min = "3000";
            string max = "4000";
            webDriver.FindElement(By.Id("priceMinFilter")).SendKeys(min);
            webDriver.FindElement(By.Id("priceMaxFilter")).SendKeys(max);
            webDriver.FindElement(By.Id("searchbtn")).Click();
            int price = int.Parse(webDriver.FindElements(By.ClassName("itemprice"))[0].Text);
            Assert.IsTrue(price >= int.Parse(min) && price <= int.Parse(max));
        }

        [Test]
        public void CartypeFilter()
        {
            var select = new SelectElement(webDriver.FindElement(By.Id("carTypesFilter")));
            select.SelectByText("Audi 100 1994");
            webDriver.FindElement(By.Id("searchbtn")).Click();
            Assert.AreEqual("Audi 100", webDriver.FindElements(By.Id("cartype"))[0].Text);
        }

        [Test]
        public void TypeFilter()
        {
            var select = new SelectElement(webDriver.FindElement(By.Id("typesFilter")));
            select.SelectByText("Wheel");
            webDriver.FindElement(By.Id("searchbtn")).Click();
            Assert.AreEqual("Wheel", webDriver.FindElements(By.Id("type"))[0].Text);
        }
    }
}
