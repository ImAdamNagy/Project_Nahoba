using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Threading;

namespace SeleniumTest
{
    internal class AdminTests
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/login";
        private IWebDriver webDriver { get; set; }
        private WebDriverWait wait { get; set; }

        [SetUp]
        public void Setup()
        {
            webDriver = new ChromeDriver();
            wait = new WebDriverWait(webDriver, TimeSpan.FromSeconds(20));
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromSeconds(60);

            //login as admin
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);

            webDriver.FindElement(By.Id("username")).SendKeys("admin");
            webDriver.FindElement(By.Id("password")).SendKeys("admin123");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("logout")));
            Assert.AreEqual("http://localhost:5174/adminmain", webDriver.Url);
        }

        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }

        [Test]
        public void AdminNavBarTest()
        {
            webDriver.FindElement(By.ClassName("products")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/productsonly", webDriver.Url);

            webDriver.FindElement(By.ClassName("mechanics")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/mechanicsonly", webDriver.Url);

            webDriver.FindElement(By.ClassName("messages")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/messages", webDriver.Url);

            webDriver.FindElement(By.ClassName("messages")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/messages", webDriver.Url);

            webDriver.FindElement(By.ClassName("adminmain")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/adminmain", webDriver.Url);

            webDriver.FindElement(By.Id("mainpage")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/", webDriver.Url);
        }

        public bool isAlertPresent()
        {
            try
            {
                webDriver.SwitchTo().Alert();
                return true;
            }
            catch (NoAlertPresentException Ex)
            {
                return false;
            }   
        }   

        [Test]
        public void AddProductType()
        {
            webDriver.FindElement(By.Id("addProductType")).Click();
            Thread.Sleep(1000);

            var type = webDriver.FindElement(By.Id("type"));
            type.Clear();
            type.SendKeys("Interior");

            webDriver.FindElement(By.Id("typeSubmit")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.AlertIsPresent());
            bool alert = isAlertPresent();
            Assert.IsTrue(alert);
            webDriver.SwitchTo().Alert().Accept();
        }

        [Test]
        public void AddCarType()
        {
            webDriver.FindElement(By.Id("addProductCarType")).Click();
            Thread.Sleep(2000);

            var cartype = webDriver.FindElement(By.Id("name"));
            cartype.Clear();
            cartype.SendKeys("Honda Prelude");
            var caryear = webDriver.FindElement(By.Id("year"));
            caryear.Clear();
            caryear.SendKeys("1997");

            webDriver.FindElement(By.Id("cartypeSubmit")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.AlertIsPresent());
            bool alert = isAlertPresent();
            Assert.IsTrue(alert);
            webDriver.SwitchTo().Alert().Accept();
        }

        [Test]
        public void AddInvalidCarType()
        {
            webDriver.FindElement(By.Id("addProductCarType")).Click();
            Thread.Sleep(2000);

            var cartype = webDriver.FindElement(By.Id("name"));
            cartype.Click();
            var caryear = webDriver.FindElement(By.Id("year"));
            caryear.Clear();
            caryear.SendKeys("1997");
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));
            Assert.AreEqual("name is not valid.", webDriver.FindElement(By.ClassName("alert")).Text);
        }

        [Test]
        public void AddInvalidCarYear()
        {
            webDriver.FindElement(By.Id("addProductCarType")).Click();
            Thread.Sleep(2000);

            var caryear = webDriver.FindElement(By.Id("year"));
            caryear.Click();
            var cartype = webDriver.FindElement(By.Id("name"));
            cartype.Clear();
            cartype.SendKeys("Honda Accord");
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));
            Assert.AreEqual("year is not valid.", webDriver.FindElement(By.ClassName("alert")).Text);
        }

        [Test]
        public void AddInvalidProductType()
        {
            webDriver.FindElement(By.Id("addProductType")).Click();
            Thread.Sleep(2000);

            var type = webDriver.FindElement(By.Id("type"));
            type.Click();
            webDriver.FindElement(By.Id("typeSubmit")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));
            Assert.AreEqual("type is not valid.", webDriver.FindElement(By.ClassName("alert")).Text);
        }
    }
}
